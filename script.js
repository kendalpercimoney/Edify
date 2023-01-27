// Check if imageUrl and verse are stored in localStorage
const imageUrl = localStorage.getItem('imageUrl');
const verse = localStorage.getItem('verse');

if (imageUrl && verse) {
    // Update the background image
    document.querySelector('.hero-image').style.backgroundImage = `url(${imageUrl})`;
    // Update the verse text
    document.querySelector('.quote-text h2').textContent = verse;
} else {
    // Fetch the image and verse from the endpoint
    fetch('https://firstiimpression.com/edifyAPI.php')
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
}

window.onload = function() {
    // Check if the user's name is already saved in local storage
    var userName = localStorage.getItem("userName");
    if (userName) {
        // Replace "kendal" with the user's name
        document.getElementById("name").innerHTML = userName;
    } else {
        // If the user's name is not saved, ask for it
        askForName();
    }
}

function askForName() {
    // Ask the user for their name
    var userName = prompt("Hi there! Thanks for downloading Edify. I hope it adds to your day! To get started, please tell me your name:");
    // Save the user's name to local storage
    localStorage.setItem("userName", userName);
    // Replace "kendal" with the user's name
    document.getElementById("name").innerHTML = userName;
}

document.querySelector('#content-container').style.display = "block";
document.querySelector('#content-container').classList.add('fade-in');

