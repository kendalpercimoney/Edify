<?php
    header("Access-Control-Allow-Origin: *");
    $data = array(
        'imageUrl' => 'https://firstiimpression.com/images/1.jpg',
        'verse' => 'Love does nost delight in evil but rejoices with the truth. It always protects, always trusts, always hopes, always perseveres.'
    );
    header('Content-Type: application/json');
    echo json_encode($data);
    