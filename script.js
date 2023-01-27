fetch('https://firstiimpression.com/edifyAPI.php')
    .then(response => response.json())
    .then(data => {
        // Update the background image
        document.querySelector('.hero-image').style.backgroundImage = `url(${data.imageUrl})`;
        // Update the verse text
        document.querySelector('.quote-text h2').textContent = data.verse;
    })
    .catch(error => console.error('Error:', error));

    