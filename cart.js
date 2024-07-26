const cartItems = document.querySelector('.cart-item');

const deleteButton = cartItems.querySelector('.delete-button');
    deleteButton.addEventListener('click', function() {
        cartItems.remove();
      });