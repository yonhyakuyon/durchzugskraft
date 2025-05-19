(() => {

    const updateCounter = () => {
        try {

            const cartData = localStorage.getItem('cart');
            const cart = cartData ? JSON.parse(cartData) : {};


            const total = Object.values(cart).reduce((acc, qty) => acc + qty, 0);

            document.querySelectorAll('.cart-counter-badge').forEach(element => {
                element.textContent = total;
            });
        } catch (error) {
            console.log('Cart counter error:', error);
        }
    };

    document.addEventListener('DOMContentLoaded', () => {
        updateCounter();

        window.addEventListener('storage', (e) => {
            if (e.key === 'cart') updateCounter();
        });

        document.addEventListener('click', updateCounter);
    });

    setInterval(updateCounter, 100);
})();