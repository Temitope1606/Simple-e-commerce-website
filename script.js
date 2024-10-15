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
// <<<<<< >>>>>>>

// "X" button in the sidebar
const sidebar = document.getElementById("open-sidebar");
const closemenu = document.getElementById("closeBtn");

closemenu.addEventListener("click", function () {
  sidebar.checked = false; // unchecks the checkbox
});
// <<<<>>>>>>>

/* The codes in here will be executed when "ADD TO CART" button is clicked */
// Select all add-to-cart forms
const addToCartForms = document.querySelectorAll("#addToCartForm");

// Loop through each form and add an event listener
addToCartForms.forEach((form) => {
  form.addEventListener("submit", (e) => {
    e.preventDefault(); // Prevent form submission from reloading the page

    // Collect the form data
    const formData = new FormData(form);

    // Use fetch to send the data to PHP without reloading the page
    fetch("add_to_cart.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        // Update cart count (assuming PHP returns the updated cart count)
        document.querySelector("#cart-count").textContent = data;
        document.querySelector("#cart-count-ph").textContent = data; // for smaller screen size

        // Optionally, show a success message or update the UI
        // alert("Item added to cart!");

        // to notify that an item has been added to the cart
        notification.style.display = "block";

        // hides the notification after 3 seconds
        setTimeout(() => {
          notification.style.display = "none";
        }, 3000);

        /* QUANTITY INCREASE AND DECREASE */
        // hides the "ADD TO CART" Button
        // form.style.display = "none";

        // shows the quantity controls "-" & "+"
        // const quantityControl = form.nextElementSibling;
        // quantityControl.style.display = "flex";
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
});
// end

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
