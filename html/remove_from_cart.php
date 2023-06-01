<?php
session_start();

if (isset($_POST['itemId']) && isset($_POST['itemType'])) {
    $itemId = $_POST['itemId'];
    $itemType = $_POST['itemType'];

    if ($itemType === 'menu') {
        if (($key = array_search($itemId, $_SESSION['cart']['menu'])) !== false) {
            unset($_SESSION['cart']['menu'][$key]);
        }
    } elseif ($itemType === 'produit') {
        if (($key = array_search($itemId, $_SESSION['cart']['produit'])) !== false) {
            unset($_SESSION['cart']['produit'][$key]);
        }
    }

    http_response_code(200);
    exit();
}

http_response_code(400);
exit();
?>
