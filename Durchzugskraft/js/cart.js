var cart = {}; //корзина
function loadCart() {
    //проверка на наличие cart в localStorage
    if (localStorage.getItem('cart')) {
        //если есть: str -> obj; showMiniCart()
        cart = JSON.parse(localStorage.getItem('cart'));
        showCart();
    } else {
        $('.main-cart').html('Корзина пуста :(');
    }
}

function showCart() {
    var products = JSON.parse(document.getElementById('json-data').textContent); //получение товаров
    var out = '';
    if (!isEmpty(cart)) { // проверка корзины на пустоту
        $('.main-cart').html('Корзина пуста :(');
    } else {
        for (var id in cart) {
            out += `<div class="main-cart">`;
            out += `<button data-id ="${id}" class="del-products">/</button>`;
            out += `<img src = "/assets/images/products/${products[id].image}">`;
            out += ` ${products[id].name}`;
            out += `<button data-id ="${id}" class="plus">+</button>`;
            out += `${cart[id]}`;
            out += `<button data-id ="${id}" class="minus">-</button>`;
            out += `${cart[id]*products[id].price}`;
            out += '<br>';
            out += `</div>`;
        }
        $('.main-cart').html(out);
        $('.del-products').on('click', delProducts);
        $('.plus').on('click', plusProduct);
        $('.minus').on('click', minusProduct);
    }

    function plusProduct() {
        // еденичное увеличивание товара
        var articul = $(this).attr('data-id');
        cart[articul]++;
        showCart();
        saveCart();
    }

    function minusProduct() {
        // еденичное уменьшение товара
        var articul = $(this).attr('data-id');
        if (cart[articul] > 1) cart[articul]--;
        else delete cart[articul];
        showCart();
        saveCart();
    }
}

function delProducts() {
    //удаление товара из корзины
    var id = $(this).attr('data-id');
    delete cart[id];
    saveCart();
    showCart();
    $.notify('Товар удалён :(', 'success');
}

function saveCart() {
    //сохранение cart в localStorage
    localStorage.setItem('cart', JSON.stringify(cart)); //объект корзина -> строка корзина
    saveJsonToSession(cart);
}

function isEmpty(object) {
    //проверка на пустоту корзины
    for (var key in object)
        if (object.hasOwnProperty(key)) return true;
    return false;

}

function makeOrder() { // создаём заказ
    if (isEmpty(cart)) { // проверяем корзину перед заказом
        // переход на страницу заказа
        window.location.href = 'order';
        localStorage.clear('cart'); //очищаем корзину после заказа
    } else {
        alert('Ваша корзина пуста, вы не владелец BMW');
    }
}

function saveJsonToSession(jsonData) {
    $.ajax({
        url: 'save_json.php', // URL, который будет обрабатывать запрос
        type: 'POST',
        data: { json: JSON.stringify(jsonData) },
        success: function(response) {
            console.log('JSON saved to session successfully:', response);
        },
        error: function(xhr, status, error) {
            console.error('Error saving JSON to session:', error);
        }
    });
}
$(document).ready(function() {
    loadCart();
    $('.make-order').on('click', makeOrder); //сделать заказ
})