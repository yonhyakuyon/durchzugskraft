var cart = {}; //корзина
function loadCart() {

    //проверка на наличие cart в localStorage
    if (localStorage.getItem('cart')) {
        //если есть: str -> obj; showMiniCart()
        cart = JSON.parse(localStorage.getItem('cart'));
        console.log(cart);
        showCart();
    } else {
        $('.main-cart').html('Ваша корзина пуста, <a href="index.php"> перейти в каталог</a>?');
    }
}
function showCart() {
    var products = JSON.parse(document.getElementById('json-data').textContent);
    var out = '<table class="cart-table">';



    if (!isEmpty(cart)) {
        // Заголовки таблицы
        out += `
        <thead>
            <tr>
                <th class="product-col">Товар</th>
                <th class="qty-col">Количество</th>
                <th class="price-col">Цена</th>
                <th class="total-col">Сумма</th>
                <th class="remove-col"></th>
            </tr>
        </thead>
        <tbody>`;
        for (var id in cart) {
            var product = products[id];
            var price = parseInt(product.characteristics.Price) || 0;
            var total = cart[id] * price;

            out += `
                <tr class="cart-item" data-id="${id}">
                    <td class="product-col">
                        <img src="/assets/images/products/${product.product_image}" 
                             class="product-image">
                        <div class="product-title">${product.product_title}</div>
                    </td>
                    <td class="qty-col">
                        <button class="minus">-</button>
                        <span class="quantity">${cart[id]}</span>
                        <button class="plus">+</button>
                    </td>
                    <td class="price-col">${price} ₽</td>
                    <td class="total-col">${total} ₽</td>
                    <td class="remove-col">
                        <button class="del-products">✕</button>
                    </td>
                </tr>
                `;
        }
    } else {
        out += `
            <tr>
                <td colspan="5" class="empty-cart">Ваша корзина пуста, <a href="index.php"> перейти в каталог</a>? </td>
            </tr>`;
    }

    out += `</tbody>`;

    // Итоговая сумма
    if (!isEmpty(cart)) {
        var totalSum = Object.keys(cart).reduce((sum, id) => {
            return sum + (cart[id] * parseInt(products[id].characteristics.Price));
        }, 0);

        out += `
            <tfoot>
                <tr>
                    <td colspan="3" class="total-label">Итого:</td>
                    <td colspan="2" class="total-sum">${totalSum} ₽</td>
                </tr>
            </tfoot>`;
    }

    out += `</table> `;
    var btn = `<button class="make-order">Заказать</button>`;
    $('.main-cart').html(out);
    if (!isEmpty(cart)) {
        $('.order').html(btn);
    }

    // Назначаем обработчики
    $('.del-products').on('click', delProducts);
    $('.plus').on('click', plusProduct);
    $('.minus').on('click', minusProduct);
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
function delProducts(event) {
    const item = event.target.closest('.cart-item');
    const id = item.dataset.id;
    delete cart[id];
    saveCart();
    showCart();
    showNotification('Товар удалён');
}

// Функция увеличения количества
function plusProduct(event) {
    const item = event.target.closest('.cart-item');
    const id = item.dataset.id;
    cart[id] = (cart[id] || 0) + 1;
    saveCart();
    showCart();
}

// Функция уменьшения количества
function minusProduct(event) {
    const item = event.target.closest('.cart-item');
    const id = item.dataset.id;
    if (cart[id] > 1) {
        cart[id] -= 1;
    } else {
        delete cart[id];
    }
    saveCart();
    showCart();
}
function saveCart() {
    //сохранение cart в localStorage
    localStorage.setItem('cart', JSON.stringify(cart)); //объект корзина -> строка корзина
    saveJsonToSession(cart);

}

function isEmpty(obj) {
    // Проверяем, что объект существует и является объектом
    if (!obj || typeof obj !== 'object') {
        return true;
    }

    // Проверяем наличие собственных перечислимых свойств
    return Object.keys(obj).length === 0;
}

function makeOrder() { // создаём заказ
    if (!isEmpty(cart)) { // проверяем корзину перед заказом
        // переход на страницу заказа
        window.location.href = 'order';
        localStorage.clear('cart'); //очищаем корзину после заказа
    } else {
        alert('Ваша корзина пуста, посетите каталог');
    }
}

$(document).ready(function () {
    loadCart();
    $('.make-order').on('click', makeOrder); //сделать заказ
})