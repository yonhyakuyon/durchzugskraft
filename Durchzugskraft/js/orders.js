function init(params) {
    var orders = JSON.parse(document.getElementById('orders-list').textContent);
    var products = JSON.parse(document.getElementById('products').textContent);
    showOrders(orders, products);
}

function showOrders(orders, products) {
    var out = ``;
    for (var key in orders) {
        var id = orders[key][0];
        var date = orders[key][1];
        var cart = orders[key][2];
        out += `<div class="order">`;
        out += `<div class="order-info">${id}, ${date},`;

        cart = JSON.parse(cart);
        for (var id in cart) {
            // console.log(id)
            // console.log(cart[id]);
            console.log(products[id]);
            out += `<img class="order-img" src="/assets/images/products/${products[id].image}" alt="">,`;

        }
        out += `${cart[id]}</div>`;
        out += `</div>`;
    }
    $('.orders-list').html(out);
}
$(document).ready(function() {
    init();
});