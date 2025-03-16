document.addEventListener("DOMContentLoaded", function () {
    const decrementBtn = document.querySelector(".decrement");
    const incrementBtn = document.querySelector(".increment");
    const quantityValue = document.querySelector(".quantity-value");

    function updateQuantity(change) {
        let quantity = parseInt(quantityValue.textContent);
        quantity += change;

        if (quantity < 1) {
            quantity = 1;
        }

        quantityValue.textContent = quantity;
        decrementBtn.disabled = quantity === 1;
    }

    decrementBtn.addEventListener("click", function () {
        updateQuantity(-1);
    });

    incrementBtn.addEventListener("click", function () {
        updateQuantity(1);
    });

    // Disable the decrement button at the start
    decrementBtn.disabled = true;
});
