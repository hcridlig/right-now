<?php
session_start();

// Check if the request contains the necessary parameters
if (isset($_POST['itemId']) && isset($_POST['itemType'])) {
    $itemId = $_POST['itemId'];
    $itemType = $_POST['itemType'];

    // Add the item to the respective array in the session cart
    if ($itemType === 'menu') {
        $_SESSION['cart']['menu'][] = $itemId;
    } elseif ($itemType === 'produit') {
        $_SESSION['cart']['produit'][] = $itemId;
    }

    // Return a success response
    http_response_code(200);
    exit();
}

// If the request is invalid or missing parameters, return an error response
http_response_code(400);
exit();
?>
