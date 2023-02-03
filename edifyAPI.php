<?php
    header("Access-Control-Allow-Origin: *");
    $data = array(
        'imageUrl' => 'https://firstiimpression.com/Edify/images/3_tobias-wilden-ZWeLtP4kQlA-unsplash.jpg',
        'verse' => 'Proverbs 3:5 - Trust in the Lord with all your heart and lean not on your own understanding; in all your ways submit to him, and he will make your paths straight.'
    );
    header('Content-Type: application/json');
    echo json_encode($data);
    