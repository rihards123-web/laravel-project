document.addEventListener("DOMContentLoaded", function () {
    console.log("🚀 add-to-cart.js loaded!");

    const addToCartBtn = document.querySelector(".add-to-cart");

    if (!addToCartBtn) {
        console.error("❌ Add to cart button not found!");
        return;
    }

    const cartAddUrl = document.querySelector("meta[name='cart-add-url']").content;

    addToCartBtn.addEventListener("click", function () {
        console.log("🛒 Add to cart clicked! Product ID:", this.dataset.productId);

        fetch(cartAddUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                product_id: this.dataset.productId,
                quantity: document.querySelector(".quantity-value").innerText
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log("✅ Added to cart:", data);
          //  document.getElementById("cart-message").innerText = "✅ Product added to cart!";
            alert('Product added to cart')
        })
        .catch(error => console.error("❌ Error:", error));
    });
});
