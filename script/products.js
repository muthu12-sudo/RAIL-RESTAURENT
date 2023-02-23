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
    { id: 1, name: "IDLY", price: 30 },
    { id: 2, name: "DOSA", price: 40 },
    { id: 3, name: "ROTI", price: 30 },
    { id: 4, name: "PONGAL", price: 50 },
    { id: 5, name: "VADA", price: 10 },
    { id: 6, name: "TEA", price: 10 },
    { id: 7, name: "COFFEE", price: 15 },
    { id: 8, name: "MILK", price: 10 },
    { id: 9, name: "POORI", price: 25 },
    { id: 10, name: "BAJJI", price: 10 },
    { id: 11, name: "SAMOSA", price: 10 },
    { id: 12, name: "EGG PUFFS", price: 20 },
    { id: 13, name: "CHICKEN PUFFS", price: 30 },
    { id: 14, name: "BISCUITS", price: 10 },
    { id: 15, name: "PLAIN BRIYANI", price: 70 },
    { id: 16, name: "EGG BRIYANI", price: 80 },
    { id: 17, name: "CHICKEN BRIYANI", price: 120 },
    { id: 18, name: "FISH BRIYANI", price: 150 },
    { id: 19, name: "FISH CURRY", price: 100 },
    { id: 20, name: "PAROTA", price: 10 },
    { id: 21, name: "FULL MEALS", price: 100 },
    { id: 22, name: "HALF MEALS", price: 60 },
    { id: 23, name: "CURD RICE", price: 30 },
    { id: 24, name: "LEMON RICE", price: 30 }
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