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

/* ---------Bookmarks Functionality------------- */

let deleteMode = false;

// Get favicon for a URL
function getFaviconUrl(urlString) {
  try {
    const url = new URL(urlString);
    return `https://www.google.com/s2/favicons?sz=16&domain=${url.hostname}`;
  } catch (e) {
    return null;
  }
}

// Initialize bookmarks
function initializeBookmarks() {
  const bookmarks = JSON.parse(localStorage.getItem('bookmarks')) || [];
  renderBookmarks(bookmarks);
}

// Render bookmarks
function renderBookmarks(bookmarks) {
  const bookmarksList = document.getElementById('bookmarksList');
  bookmarksList.innerHTML = '';
  
  bookmarks.forEach((bookmark, index) => {
    const bookmarkItem = document.createElement('div');
    bookmarkItem.className = 'bookmark-item';
    bookmarkItem.draggable = deleteMode;
    bookmarkItem.dataset.index = index;
    
    const faviconUrl = getFaviconUrl(bookmark.url);
    const favicon = faviconUrl ? `<img src="${faviconUrl}" alt="favicon" class="clickable-favicon" data-index="${index}">` : '<span class="clickable-favicon" data-index="${index}">🔗</span>';
    
    bookmarkItem.innerHTML = `
      <button class="drag-handle ${deleteMode ? 'visible' : ''}" data-index="${index}">☰</button>
      ${favicon}
      <span class="bookmark-text" title="${bookmark.title}">${bookmark.title}</span>
      <button class="remove-bookmark ${deleteMode ? 'visible' : ''}" data-index="${index}">✕</button>
    `;
    
    // Click to open bookmark (favicon and text)
    const openBookmark = function() {
      if (!deleteMode) {
        window.open(bookmark.url, '_blank');
        bookmarksMenu.classList.remove('active');
      }
    };
    
    bookmarkItem.addEventListener('click', openBookmark);
    
    // Drag and drop functionality
    bookmarkItem.addEventListener('dragstart', function(e) {
      e.dataTransfer.effectAllowed = 'move';
      bookmarkItem.classList.add('dragging');
    });
    
    bookmarkItem.addEventListener('dragend', function(e) {
      bookmarkItem.classList.remove('dragging');
    });
    
    bookmarkItem.addEventListener('dragover', function(e) {
      e.preventDefault();
      e.dataTransfer.dropEffect = 'move';
      bookmarkItem.classList.add('drag-over');
    });
    
    bookmarkItem.addEventListener('dragleave', function(e) {
      bookmarkItem.classList.remove('drag-over');
    });
    
    bookmarkItem.addEventListener('drop', function(e) {
      e.preventDefault();
      bookmarkItem.classList.remove('drag-over');
      
      const draggedItem = document.querySelector('.bookmark-item.dragging');
      if (draggedItem && draggedItem !== bookmarkItem) {
        const draggedIndex = parseInt(draggedItem.dataset.index);
        const targetIndex = index;
        
        // Swap the bookmarks
        [bookmarks[draggedIndex], bookmarks[targetIndex]] = [bookmarks[targetIndex], bookmarks[draggedIndex]];
        localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
        renderBookmarks(bookmarks);
      }
    });
    
    // Remove bookmark
    bookmarkItem.querySelector('.remove-bookmark').addEventListener('click', function(e) {
      e.stopPropagation();
      const newBookmarks = bookmarks.filter((_, i) => i !== index);
      localStorage.setItem('bookmarks', JSON.stringify(newBookmarks));
      renderBookmarks(newBookmarks);
    });
    
    bookmarksList.appendChild(bookmarkItem);
  });
}

// Bookmarks Button Functionality
const bookmarksButton = document.getElementById('bookmarksButton');
const bookmarksMenu = document.getElementById('bookmarksMenu');
const addBookmarkItem = document.getElementById('addBookmarkItem');
const deleteBookmarkItem = document.getElementById('deleteBookmarkItem');

// Toggle menu on button click
bookmarksButton.addEventListener('click', function(e) {
  e.stopPropagation();
  bookmarksMenu.classList.toggle('active');
});

// Add bookmark functionality
addBookmarkItem.addEventListener('click', function(e) {
  e.stopPropagation();
  let url = prompt('Enter the URL to bookmark:');
  if (url && url.trim() !== '') {
    try {
      // Add https:// if no protocol is provided
      if (!url.startsWith('http://') && !url.startsWith('https://')) {
        url = 'https://' + url;
      }
      new URL(url);
      const bookmarks = JSON.parse(localStorage.getItem('bookmarks')) || [];
      
      // Try to get the title from the user, otherwise use the URL
      const title = prompt('Enter a name for this bookmark:') || url;
      
      bookmarks.push({ url, title });
      localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
      renderBookmarks(bookmarks);
    } catch (e) {
      alert('Please enter a valid URL');
    }
  }
});

// Delete bookmark toggle functionality
deleteBookmarkItem.addEventListener('click', function(e) {
  e.stopPropagation();
  deleteMode = !deleteMode;
  deleteBookmarkItem.style.backgroundColor = deleteMode ? 'rgba(255, 100, 100, 0.3)' : 'transparent';
  
  // Update draggable and refresh bookmarks
  const bookmarks = JSON.parse(localStorage.getItem('bookmarks')) || [];
  document.querySelectorAll('.bookmark-item').forEach(item => {
    item.draggable = deleteMode;
  });
  renderBookmarks(bookmarks);
});

// Close menu when clicking outside
document.addEventListener('click', function(e) {
  if (!bookmarksButton.contains(e.target) && !bookmarksMenu.contains(e.target)) {
    bookmarksMenu.classList.remove('active');
    deleteMode = false;
    deleteBookmarkItem.style.backgroundColor = 'transparent';
    const bookmarks = JSON.parse(localStorage.getItem('bookmarks')) || [];
    renderBookmarks(bookmarks);
  }
});

// Initialize bookmarks on page load
window.addEventListener('DOMContentLoaded', initializeBookmarks);

