// Add event listeners to plus and minus buttons
const minusButtons = document.querySelectorAll('[id^="minus-"]');
const plusButtons = document.querySelectorAll('[id^="plus-"]');
const orderButton = document.getElementById("order-now");
const totalQuantityInput = document.getElementById("total-quantity");
const totalPriceInput = document.getElementById("total-price");
const totalQuantityDisplay = document.getElementById("total-quantity-display");
const totalPriceDisplay = document.getElementById("total-price-display");
let totalQuantity = 0;
let totalPrice = 0;
minusButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        // Decrement quantity and price
        const productId = event.target.id.split("-")[1];
        const quantityElement = document.getElementById(`quantity-${productId}`);
        let quantity = parseInt(quantityElement.innerText);
        if (quantity > 0) {
            quantity--;
            quantityElement.innerText = quantity;
            totalQuantity--;
            totalPrice -= products[productId - 1].price; // subtract product price from total price
        }
        // Disable order button if no products are selected
        if (totalQuantity === 0) {
            orderButton.disabled = true;
        } else {
            orderButton.disabled = false;
        }
        // Update total quantity and price input values and displays
        totalQuantityInput.value = totalQuantity;
        totalPriceInput.value = totalPrice;
        totalQuantityDisplay.innerText = `Total quantity: ${totalQuantity}`;
        totalPriceDisplay.innerText = `Total price: ₹${totalPrice.toFixed(2)}`;
    });
});

plusButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        // Increment quantity and price
        const productId = event.target.id.split("-")[1];
        const quantityElement = document.getElementById(`quantity-${productId}`);
        let quantity = parseInt(quantityElement.innerText);
        quantity++;
        quantityElement.innerText = quantity;
        totalQuantity++;
        totalPrice += products[productId - 1].price; // add product price to total price

        // Enable order button
        orderButton.disabled = false;
        // Update total quantity and price input values and displays
        totalQuantityInput.value = totalQuantity;
        totalPriceInput.value = totalPrice;
        totalQuantityDisplay.innerText = `Total quantity: ${totalQuantity}`;
        totalPriceDisplay.innerText = `Total price: ₹${totalPrice.toFixed(2)}`;
    });
});
const clearAllButton = document.getElementById("clear-all");

clearAllButton.addEventListener("click", () => {
    // Reset all quantities and prices to 0
    minusButtons.forEach((button) => {
        const productId = button.id.split("-")[1];
        const quantityElement = document.getElementById(`quantity-${productId}`);
        quantityElement.innerText = "0";
    });
    totalQuantity = 0;
    totalPrice = 0;

    // Disable order button and update total quantity and price input values and displays
    orderButton.disabled = true;
    totalQuantityInput.value = totalQuantity;
    totalPriceInput.value = totalPrice;
    totalQuantityDisplay.innerText = `Total quantity: ${totalQuantity}`;
    totalPriceDisplay.innerText = `Total price: ₹${totalPrice.toFixed(2)}`;
});
//product price list
let products = [
    { id: 1, name: "GRIPE WATER", price: 80 },
    { id: 2, name: "NESTLE CERELAC", price: 280 },
    { id: 3, name: "DIAPERS", price: 399 },
    { id: 4, name: "MILK FOR BABIES", price: 120 },

];
// Get a reference to the hidden div
var hiddenDiv = document.getElementById("fixed");

// Add an event listener for the scroll event
window.addEventListener("scroll", function() {
    // Check if the user has scrolled the page
    if (window.scrollY > 0) {
        // If they have, show the hidden div
        hiddenDiv.style.display = "block";
    } else {
        // If they haven't scrolled, hide the div again
        hiddenDiv.style.display = "none";
    }
});