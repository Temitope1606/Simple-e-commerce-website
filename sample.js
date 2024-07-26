

// "X" button in the sidebar
const sidebar = document.getElementById("open-sidebar");
const closemenu = document.getElementById("closeBtn");

closemenu.addEventListener("click", function () {
  sidebar.checked = false;  // unchecks the checkbox
});

// For cart counter
const addToCartButtons = document.querySelectorAll('.add-to-cart');
let itemCount = 0;


/* The codes in here will be executed when "ADD TO CART" button is clicked */
function addToCart(button) {
  
  // to update the cart counter
  itemCount++;
  document.getElementById('cart-count').innerText = itemCount;
  document.getElementById('cart-count-ph').innerText = itemCount;

  // to notify that an item has been added to the cart
  notification.style.display = 'block';

  // hides the notification after 3 seconds
  setTimeout(() => {
    notification.style.display = 'none';
  }, 3000);

  /* QUANTITY INCREASE AND DECREASE */
  // hides the "ADD TO CART" Button
  button.style.display = 'none';

  // shows the quantity controls "-" & "+"
  const quantityControl = button.nextElementSibling;
  quantityControl.style.display = 'flex';
}

/* Function for quantity controls */
function changeQuantity(button, change) {
  // get the quantity text(amount)
  const quantity = button.parentElement.querySelector('.quantity');

  // get the current quantity
  let currentQuantity = parseInt(quantity.innerText); // parseInt() converts the quantity text to integer
  // update the quantity
  currentQuantity += change;

  // ensuring the quantity doesn't go below 1
  if (currentQuantity < 1) {
    currentQuantity = 1;
  }
  // updating the quantity text(amount)
  quantity.innerText = currentQuantity;

  // update the cart count
 // updateCartCount();

 cartCount += currentQuantity;
 updateCartCount();
}

// Function for updating the cart count on the shopping cart icon
  let cartCount = 0;
 function updateCartCount() {
   document.querySelector('#cart-count').innerText = cartCount;
   document.querySelector('#cart-count-ph').innerText = cartCount;

//   const quantitySpans = document.querySelectorAll('.quantity-control .quantity');

//   // calculate the total quantity
//   let totalQuantity = 0;
//   quantitySpans.forEach(span => {
//     totalQuantity += parseInt(span.innerText);
//   });

//   // Update the cart count display
//   document.querySelector('#cart-count').innerText = totalQuantity;
//   document.querySelector('#cart-count-ph').innerText = totalQuantity;
 }

// iterates through all the "ADD TO CART" present
addToCartButtons.forEach(function (button) {
  button.addEventListener('click', function () {
    addToCart(button);
  });
});

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
const notification = document.getElementById('notification');
const closeNotification = document.getElementById('close-notification');

// for closing the notification bar
closeNotification.addEventListener('click', () => {
  notification.style.display = 'none';
});
