document.addEventListener("DOMContentLoaded", function () {
    console.log("🛒 remove-from-cart.js loaded!");

    document.querySelectorAll(".remove-from-cart").forEach(button => {
        button.addEventListener("click", function () {
            let productId = this.getAttribute("data-product-id");

            const cartRemoveUrl = document.querySelector("meta[name='cart-remove-url']").content;
            const csrfToken = document.querySelector("meta[name='csrf-token']").content;

            console.log(`🗑 Removing Product ID: ${productId}`);

            fetch(cartRemoveUrl, {
                method: "POST", // Instead of DELETE
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({ product_id: productId }) // Send data in the request body
            })
            .then(response => response.json())
            .then(data => {
                console.log("✅ Removed from cart:", data);
                location.reload(); // Refresh page to update cart
            })
            .catch(error => console.error("❌ Error:", error));
        });
    });
});
