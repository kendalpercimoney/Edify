// Check if imageUrl and verse are stored in localStorage
const imageUrl = localStorage.getItem('imageUrl');
const verse = localStorage.getItem('verse');

if (imageUrl && verse) {
    // Update the background image
    document.querySelector('.hero-image').style.backgroundImage = `url(${imageUrl})`;
    // Update the verse text
    document.querySelector('.quote-text h2').textContent = verse;
} 

// Fetch the image and verse from the endpoint
fetch('https://firstiimpression.com/Edify/edifyAPI.php')
.then(response => response.json())
.then(data => {
    // Update the background image
    document.querySelector('.hero-image').style.backgroundImage = `url(${data.imageUrl})`;
    // Update the verse text
    document.querySelector('.quote-text h2').textContent = data.verse;

    // Store the image URL and verse text in localStorage
    localStorage.setItem('imageUrl', data.imageUrl);
    localStorage.setItem('verse', data.verse);
});



window.onload = function() {
  // Check if the user's name is already saved in local storage
  var userName = localStorage.getItem("userName");
  if (userName && userName.trim() !== "" && userName !== "null") {
      // Replace "user" with the user's name
      document.getElementById("name").innerHTML = userName;
  } else {
      // If the user's name is not saved, ask for it
      askForName();
  }
}


function askForName() {
    // Ask the user for their name
    var userName = prompt("---------------------- \nKendal here, thanks for downloading - stay blessed! \n \nTo get started, please enter your name:");
    // Save the user's name to local storage
    localStorage.setItem("userName", userName);
    // Replace "user" with the user's name
    document.getElementById("name").innerHTML = userName;
}

function addBookmark() {
    const name = document.getElementById('bookmark-name').value;
    const url = document.getElementById('bookmark-url').value;
    
    if (name && url) {
      const faviconUrl = `https://www.google.com/s2/favicons?domain=${url}`;
      const bookmarksList = document.getElementById('bookmarks-list');
  
      const bookmarkItem = document.createElement('div');
      bookmarkItem.classList.add('bookmark-item');
      bookmarkItem.innerHTML = `
        <img src="${faviconUrl}" alt="${name} Icon">
        <a href="${url}" target="_blank">${name}</a>
        <button onclick="removeBookmark(this)">Delete</button>
      `;
      
  
      bookmarksList.appendChild(bookmarkItem);
  
      // Clear input fields
      document.getElementById('bookmark-name').value = '';
      document.getElementById('bookmark-url').value = '';
    } else {
      alert('Please enter both a name and a URL.');
    }
  }
  
  function removeBookmark(button) {
    const bookmarkItem = button.parentNode;
    bookmarkItem.remove();
  }

document.querySelector('#content-container').style.display = "block";
document.querySelector('#content-container').classList.add('fade-in');

// Info Button Functionality
const infoButton = document.getElementById('infoButton');
const infoMenu = document.getElementById('infoMenu');
const changeNameItem = document.getElementById('changeNameItem');

// Toggle menu on button click
infoButton.addEventListener('click', function(e) {
  e.stopPropagation();
  infoMenu.classList.toggle('active');
});

// Change Name functionality
changeNameItem.addEventListener('click', function(e) {
  e.preventDefault();
  const newName = prompt('We already have a new identity in Christ (2 Cor. 5:17)! \n\nBut you have free will to change your name to:');
  if (newName && newName.trim() !== '') {
    localStorage.setItem('userName', newName);
    document.getElementById('name').innerHTML = newName;
    infoMenu.classList.remove('active');
  }
});

// Close menu when clicking outside
document.addEventListener('click', function(e) {
  if (!infoButton.contains(e.target) && !infoMenu.contains(e.target)) {
    infoMenu.classList.remove('active');
  }
});

// Close menu when clicking a menu item (except external links)
infoMenu.querySelectorAll('.menu-item').forEach(item => {
  item.addEventListener('click', function(e) {
    // Only close for mailto links, let target="_blank" links open new tabs
    if (this.href.startsWith('mailto:')) {
      infoMenu.classList.remove('active');
    }
  });
});

