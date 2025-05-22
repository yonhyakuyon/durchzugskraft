var cart = {}; //корзина (объект)
function init() {
    const product = JSON.parse(document.getElementById('product').textContent);
    const prodId = document.getElementById('prod-id').textContent;
    showProduct(product, prodId);
    console.log(product, prodId);
}

function showProduct(product, prodId) {
    const characteristics = product.characteristics || {};

    // Основная информация
    let out = `
            <h1>${product.product_title}</h1>
            <img class="product-image" src="/assets/images/products/${product.product_image}" alt="${product.product_title}">
    `;

    // Блок характеристик
    out += '<div class="product-specs">';

    // Обязательные характеристики
    out += '<div class="main-specs">';
    if (characteristics.Price) {
        out += `<div class="price">Цена: ${characteristics.Price} ₽</div>`;
    }
    if (characteristics.Description) {
        out += `<div class="description">Описание: ${characteristics.Description}</div>`;
    }
    out += '</div>';

    // Дополнительные характеристики
    const otherChars = Object.entries(characteristics)
        .filter(([name]) => !['Price', 'Description', 'Category'].includes(name))
        .map(([name, value]) => `
            <div class="spec-row">
                <span class="spec-name">${name}:</span>
                <span class="spec-value">${value}</span>
            </div>
        `).join('');

    if (otherChars) {
        out += `
            <div class="additional-specs">
                <h3>Технические характеристики</h3>
                ${otherChars}
            </div>
        `;
    }

    out += '</div>';

    // Кнопка добавления в корзину
    out += `
        <div class="product-actions">
            <button class="product-add-to-cart" data-id="${prodId}">Добавить в корзину</button>
        </div>
    `;

    $('.product-container').html(out);
    $('.product-add-to-cart').on('click', addToCart);
}
// var cart = {}; //корзина (объект)
// function init() {
//     //Подгружает товары для функции showProducts
//     var product = JSON.parse(document.getElementById('product').textContent);
//     var prod_id = document.getElementById('prod-id').textContent;
//     showProducts(product, prod_id);
// }

// function showProducts(product, prod_id) {
//     // Вывод на страницу

//     // Задача сделать вывод товаров с разными характеристиками
//     // можно обойтись for с заданным кол-вом харктеристик
//     var name = `${product.name}`;
//     var description = `${product.description}`;
//     var image = `<img class="product-image" src="/assets/images/products/${product.image}" alt="">`;
//     var price = `${product.price}`;
//     var button = `<button class="product-add-to-cart" data-id="${prod_id}">Приобрести</button>`;
//     $('.prod-img').html(image);
//     $('.prod-name').html(name);
//     $('.prod-description').html(description);
//     $('.prod-price').html(price);
//     $('.btn-cont').html(button);
//     $('.product-add-to-cart').on('click', addToCart);
// }

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