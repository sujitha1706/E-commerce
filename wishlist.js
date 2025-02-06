// JavaScript code to handle Add to Wishlist functionality

// Function to load wishlist items on wishlist.html page
function loadWishlist() {
    let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
    const wishlistContainer = document.getElementById('wishlist-items');

    if (wishlist.length === 0) {
        wishlistContainer.innerHTML = '<p>Your wishlist is empty.</p>';
        return;
    }

    wishlistContainer.innerHTML = '';

    wishlist.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.className = 'wishlist-item';
        itemElement.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <h3>${item.name}</h3>
            <button onclick="removeFromWishlist('${item.id}')">Remove</button>
        `;
        wishlistContainer.appendChild(itemElement);
    });
}

// Function to remove an item from the wishlist
function removeFromWishlist(itemId) {
    let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
    wishlist = wishlist.filter(item => item.id !== itemId);
    localStorage.setItem('wishlist', JSON.stringify(wishlist));
    loadWishlist();
}

// Automatically load wishlist items when the page loads
if (window.location.pathname.includes('wishlist.html')) {
    document.addEventListener('DOMContentLoaded', loadWishlist);
}
