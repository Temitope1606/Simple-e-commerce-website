/* FOR ITEM SCROLLING */
const productContainers = document.querySelectorAll(".products-container");
const nxtBtn = document.querySelectorAll(".nxt-btn");
const preBtn = document.querySelectorAll(".pre-btn");

productContainers.forEach((item, i) => {
  const productWidth =
    item.querySelector(".product").clientWidth +
    parseInt(getComputedStyle(item.querySelector(".product")).marginRight); // Get the width of a single product including margin

  nxtBtn[i].addEventListener("click", () => {
    item.scrollLeft += productWidth; // Scroll by the width of one product
  });

  preBtn[i].addEventListener("click", () => {
    item.scrollLeft -= productWidth; // Scroll back by the width of one product
  });
});
// <<<<>>>>>>>

// "X" button in the sidebar
const sidebar = document.getElementById("open-sidebar");
const closemenu = document.getElementById("closeBtn");

closemenu.addEventListener("click", function () {
  sidebar.checked = false; // unchecks the checkbox
});
// <<<<>>>>>>>

/* The codes in here will be executed when "ADD TO CART" button is clicked */
// Attach event listeners to all "ADD TO CART" buttons
const addToCartButtons = document.querySelectorAll(".add-to-cart");
addToCartButtons.forEach((button) => {
  // a function
  button.addEventListener("click", () => {
    // a function
    addToCart(button);
  });
});

// Initialize cart count
let cartCount = 0;

// Function to update the cart count display
function updateCartCount() {
  document.querySelector("#cart-count").innerText = cartCount;
  document.querySelector("#cart-count-ph").innerText = cartCount;
}

// Function to handle adding an item to the cart
function addToCart(button) {
  // Increment cart count
  cartCount++;
  updateCartCount();

  // to notify that an item has been added to the cart
  notification.style.display = "block";

  // hides the notification after 3 seconds
  setTimeout(() => {
    notification.style.display = "none";
  }, 3000);

  /* QUANTITY INCREASE AND DECREASE */
  // hides the "ADD TO CART" Button
  button.style.display = "none";

  // shows the quantity controls "-" & "+"
  const quantityControl = button.nextElementSibling;
  quantityControl.style.display = "flex";
}

/* Function for quantity controls */
// Function to handle quantity changes
function changeQuantity(button, change) {
  const quantity = button.parentElement.querySelector(".quantity");
  let currentQuantity = parseInt(quantity.innerText); // parseInt() converts the quantity text to integer

  // Update quantity
  currentQuantity += change;
  if (currentQuantity < 1) {
    currentQuantity = 0; // Ensure minimum quantity is 0
  }

  quantity.innerText = currentQuantity;

  // When "+" is clicked
  if (change === 1) {
    // to show that the item was successfully added
    notification.style.display = "block";

    // hides the notification after 3 seconds
    setTimeout(() => {
      notification.style.display = "none";
    }, 3000);
  }
  // When "-" is clicked
  else {
    // to show that the item was successfully added
    notificationRemove.style.display = "block";

    // hides the notification after 3 seconds
    setTimeout(() => {
      notificationRemove.style.display = "none";
    }, 3000);
  }
  // Update cart count based on quantity change
  cartCount += change;
  // Ensure cartCount doesn't go below 0
  if (cartCount < 0) {
    cartCount = 0;
  }
  // Update cart count in menu bar
  updateCartCount();
}
// <<<<>>>>>>>

// For when the shopping cart icon is hovered
const shoppingCart = document.querySelector("#cart");
const popUpMessage = document.querySelector("#popup");

shoppingCart.addEventListener("mouseover", showPopUpMessage);
shoppingCart.addEventListener("mouseout", hidePopUpMessage);

function showPopUpMessage() {
  popUpMessage.style.display = "block";
}

function hidePopUpMessage() {
  popUpMessage.style.display = "none";
}

// For when the shopping cart icon is hovered for phones, tablets, etc.
const shoppingCartPh = document.querySelector("#cart-Ph");
const popUpMessagePh = document.querySelector("#popup-Ph");

shoppingCartPh.addEventListener("mouseover", showPopUpMessagePh);
shoppingCartPh.addEventListener("mouseout", hidePopUpMessagePh);

function showPopUpMessagePh() {
  popUpMessagePh.style.display = "block";
}

function hidePopUpMessagePh() {
  popUpMessagePh.style.display = "none";
}

// For the notification
const notification = document.getElementById("notification");
const closeNotification = document.getElementById("close-notification");
const notificationRemove = document.getElementById("notification-remove");

// for closing the notification bar
closeNotification.addEventListener("click", () => {
  notification.style.display = "none";
});
