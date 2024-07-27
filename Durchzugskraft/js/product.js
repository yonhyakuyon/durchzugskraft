var cart = {}; //корзина (объект)
function init() {
    //Подгружает товары для функции showProducts
    var product = JSON.parse(document.getElementById('product').textContent);
    var prod_id = document.getElementById('prod-id').textContent;
    showProducts(product, prod_id);
}

function showProducts(product, prod_id) {
    // Вывод на страницу
    var name = `${product.name}`;
    var description = `${product.description}`;
    var image = `<img class="product-image" src="/assets/images/products/${product.image}" alt="">`;
    var price = `${product.price}`;
    var button = `<button class="product-add-to-cart" data-id="${prod_id}">Приобрести</button>`;
    $('.prod-img').html(image);
    $('.prod-name').html(name);
    $('.prod-description').html(description);
    $('.prod-price').html(price);
    $('.btn-cont').html(button);
    $('.product-add-to-cart').on('click', addToCart);
}

function addToCart() {
    //Добавить товар в корзину
    var id = $(this).attr('data-id');
    console.log(id);
    if (cart[id] == undefined) {
        cart[id] = 1; //если до этого не было товара, то 1
    } else {
        cart[id]++; //если такой товар уже был в корзине, то увеличиваем его кол-во
    }
    saveCart();
    $.notify('Товар добавлен в корзину!', 'success');
}

function saveCart() {
    //сохранение cart в localStorage
    localStorage.setItem('cart', JSON.stringify(cart)); //объект корзина -> строка корзина
    saveJsonToSession(cart);
}

function loadCart() {
    //проверка на наличие cart в localStorage
    if (localStorage.getItem('cart')) {
        //если есть: str -> obj; showMiniCart()
        cart = JSON.parse(localStorage.getItem('cart'));
        // showMiniCart();
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
    init();
    loadCart();
});