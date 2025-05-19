var cart = {}; //корзина (объект)
function init() {
    //Подгружает товары для функции showProducts
    var category = JSON.parse(document.getElementById('category-id').textContent);
    var products = JSON.parse(document.getElementById('products').textContent);
    // console.log(products);
    showProducts(products, category);
}
function showProducts(products, category) {
    // Вывод на страницу
    console.log(products);
    var out = '';
    for (var key in products) {
        console.log(products[key].characteristics.Category);
        if (products[key].characteristics.Category == category) {
            out += '<div class="cart">';
            out += `<a href="product/${key}" class="product-redirect">`;
            out += `<div class="name">${products[key].product_title}</div>`;
            out += `<img class="main-image" src="/assets/images/products/${products[key].product_image}" alt="">`;
            out += `</a>`;
            out += `<div class="price">${products[key].characteristics.Price} ₽</div>`;
            out += `<div class="btn-cont">`;
            out += `<button class="add-to-cart" data-id="${key}">Приобрести</button>`;
            out += `</div>`;
            out += `</div>`;
        }
    }
    $('.show-products').html(out);
    $('.add-to-cart').on('click', addToCart);
}
function addToCart() {
    //Добавить товар в корзину
    var id = $(this).attr('data-id');
    console.log(id);
    if (cart[id] == undefined) {
        cart[id] = 1; //если до этого не было товара, то 1
    }
    else {
        cart[id]++; //если такой товар уже был в корзине, то увеличиваем его кол-во
    }
    saveCart();
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
        success: function (response) {
            console.log('JSON saved to session successfully:', response);
        },
        error: function (xhr, status, error) {
            console.error('Error saving JSON to session:', error);
        }
    });
}
$(document).ready(function () {
    init();
    loadCart();
});