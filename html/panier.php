<?php
session_start();
require 'Scripts/session.php';
require 'Scripts/connection_db.php';
require 'Scripts/env_retrieve.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link href="panier.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
</head>
<body>
<?php require "nav.php"; ?>
<script>
    // Display pop-up on page load if the user is not connected
    window.addEventListener('DOMContentLoaded', () => {
        <?php if ($email == "") : ?>
        alert("Vous n'êtes pas connecté, vous allez être redirigé.");
        window.location.href = 'index.php';
        <?php endif; ?>
    });
</script>

<div class="container" style="margin-top: 8em; margin-bottom: 9em;">
    <h1 class="text-center" style="margin-bottom: 0.2em; margin-right: 30em;">Panier</h1>
    <?php print_r($_SESSION['cart']); ?>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Article</th>
                    <th scope="col">Restaurant</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $cartMenu = $_SESSION['cart']['menu'];
                $cartProduit = $_SESSION['cart']['produit'];

                // Retrieve menu items from the database
                foreach ($cartMenu as $menuId) {
                    $stmt = $connection->prepare("SELECT * FROM Menu WHERE id_Menu = ?");
                    $stmt->bind_param("i", $menuId);
                    $stmt->execute();
                    $menuResult = $stmt->get_result();

                    if ($menuResult->num_rows > 0) {
                        $menu = $menuResult->fetch_assoc();
                        $itemName = $menu['Label'];
                        $restaurantId = $menu['FK_Restaurant'];
                        $price = $menu['Prix'];
                        $quantity = 1; // Example quantity, you can fetch it from the session or update it dynamically
                        $total = $price * $quantity;

                        // Retrieve restaurant details
                        $stmt = $connection->prepare("SELECT nom FROM restaurant WHERE id_Restaurant = ?");
                        $stmt->bind_param("i", $restaurantId);
                        $stmt->execute();
                        $restaurantResult = $stmt->get_result();
                        if ($restaurantResult->num_rows > 0) {
                            $restaurant = $restaurantResult->fetch_assoc();
                            $restaurantName = $restaurant['nom'];
                        } else {
                            $restaurantName = "Unknown";
                        }
                    } else {
                        // Handle the case where the menu item doesn't exist in the database
                        $itemName = "Menu item not found";
                        $restaurantName = "";
                        $price = 0;
                        $quantity = 0;
                        $total = 0;
                    }
                    ?>
                    <tr>
                        <td><?php echo $itemName; ?></td>
                        <td><?php echo $restaurantName; ?></td>
                        <td><?php echo $price; ?> €</td>
                        <td><input type="number" value="<?php echo $quantity; ?>" min="1" max="10"
                                   class="form-control"></td>
                        <td><?php echo $total; ?> €</td>
                        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                    </tr>
                    <?php
                }

                // Retrieve product items from the database
                foreach ($cartProduit as $produitId) {
                    $stmt = $connection->prepare("SELECT * FROM Produit WHERE id_Produit = ?");
                    $stmt->bind_param("i", $produitId);
                    $stmt->execute();
                    $produitResult = $stmt->get_result();

                    if ($produitResult->num_rows > 0) {
                        $produit = $produitResult->fetch_assoc();
                        $itemName = $produit['Label'];
                        $restaurantId = $produit['FK_Restaurant'];
                        $price = $produit['Prix'];
                        $quantity = 1; // Example quantity, you can fetch it from the session or update it dynamically
                        $total = $price * $quantity;

                        // Retrieve restaurant details
                        $stmt = $connection->prepare("SELECT nom FROM restaurant WHERE id_Restaurant = ?");
                        $stmt->bind_param("i", $restaurantId);
                        $stmt->execute();
                        $restaurantResult = $stmt->get_result();
                        if ($restaurantResult->num_rows > 0) {
                            $restaurant = $restaurantResult->fetch_assoc();
                            $restaurantName = $restaurant['nom'];
                        } else {
                            $restaurantName = "Unknown";
                        }
                    } else {
                        // Handle the case where the product item doesn't exist in the database
                        $itemName = "Product item not found";
                        $restaurantName = "";
                        $price = 0;
                        $quantity = 0;
                        $total = 0;
                    }
                    ?>
                    <tr>
                        <td><?php echo $itemName; ?></td>
                        <td><?php echo $restaurantName; ?></td>
                        <td><?php echo $price; ?> €</td>
                        <td><input type="number" value="<?php echo $quantity; ?>" min="1" max="10"
                                   class="form-control"></td>
                        <td><?php echo $total; ?> €</td>
                        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Récapitulatif</h5>
                    <p class="card-text">Total de la commande : 140 €</p>
                    <p class="card-text">Livraison : 10 €</p>
                    <p class="card-text">Total à payer: 150 €</p>
                    <a href="#" class="btn btn-primary">Payer</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "end.php" ?>
</body>
</html>
