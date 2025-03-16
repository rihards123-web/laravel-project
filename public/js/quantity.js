window.onload = function () {
    const decrementBtn = document.querySelector(".decrement");
    const incrementBtn = document.querySelector(".increment");
    const quantityInput = document.getElementById("quantity");
    const basePrice = parseFloat(document.querySelector(".basePrice").innerText); // FIXED
    const totalPrice = document.getElementById("totalPrice");

    function updateTotal() {
        let quantity = parseInt(quantityInput.value);
        totalPrice.innerText = (basePrice * quantity).toFixed(2);
    }

    // Decrease Quantity
    decrementBtn.addEventListener("click", function () {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
            updateTotal();
        }
    });

    // Increase Quantity
    incrementBtn.addEventListener("click", function () {
        let currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
        updateTotal();
    });
};
