document.addEventListener("DOMContentLoaded", function () {
    const quantityInputs = document.querySelectorAll(".quantity");
    const prices = document.querySelectorAll(".price");
    const totals = document.querySelectorAll(".total");
    const grandTotalElements = document.querySelectorAll(".grand_total"); // All locations where grand total will appear
    const allTotal = document.getElementById("all_total");
    // Function to update the individual total price
    function updateTotal(quantityInput, priceElement, totalElement) {
        const quantity = parseInt(quantityInput.value);
        const price = parseFloat(priceElement.textContent.trim());
        const total = price * quantity;
        totalElement.textContent = `$${total.toFixed(2)}`;

        // After updating the individual total, update the grand total
        updateGrandTotal();
    }

    // Function to update the grand total of all items and display in multiple locations
    function updateGrandTotal() {
        let grandTotal = 0;

        totals.forEach((totalElement) => {
            const totalText = totalElement.textContent.replace("$", "");
            const total = parseFloat(totalText) || 0; // Avoid NaN when no value is present
            grandTotal += total;
        });

        allTotal.value = grandTotal;

        // Update all elements with class 'grand-total'
        grandTotalElements.forEach((grandTotalElement) => {
            grandTotalElement.textContent = `$${grandTotal.toFixed(2)}`;
        });
    }

    // Add event listeners for each item
    quantityInputs.forEach((quantityInput, index) => {
        const priceElement = prices[index];
        const totalElement = totals[index];

        // Initial total update
        updateTotal(quantityInput, priceElement, totalElement);

        // Listen for input changes
        quantityInput.addEventListener("input", function () {
            if (quantityInput.value < 1) {
                quantityInput.value = 1; // Ensures quantity doesn't go below 1
            }
            updateTotal(quantityInput, priceElement, totalElement);
        });

        // Quantity up and down buttons
        const qtyUp = document.querySelector(
            `.qty-up[data-product-id='${quantityInput.dataset.productId}']`
        );
        const qtyDown = document.querySelector(
            `.qty-down[data-product-id='${quantityInput.dataset.productId}']`
        );

        // Remove any existing event listeners
        qtyUp.replaceWith(qtyUp.cloneNode(true));
        qtyDown.replaceWith(qtyDown.cloneNode(true));

        // Re-select the new buttons to ensure no previous listeners are there
        const newQtyUp = document.querySelector(
            `.qty-up[data-product-id='${quantityInput.dataset.productId}']`
        );
        const newQtyDown = document.querySelector(
            `.qty-down[data-product-id='${quantityInput.dataset.productId}']`
        );

        // Quantity up
        newQtyUp.addEventListener("click", function () {
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updateTotal(quantityInput, priceElement, totalElement);
        });

        // Quantity down
        newQtyDown.addEventListener("click", function () {
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                updateTotal(quantityInput, priceElement, totalElement);
            }
        });
    });
});
