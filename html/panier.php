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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
  // Function to remove item from cart
  function removeItem(itemId, itemType) {
    // Send AJAX request to remove the item from session
    $.ajax({
      url: 'remove_from_cart.php',
      type: 'POST',
      data: {
        itemId: itemId,
        itemType: itemType
      },
      success: function (response) {
        // If removal is successful, remove the row from the table
        $('#row_' + itemId).remove();
        calculateTotal(); // Recalculate the total
      },
      error: function (xhr, status, error) {
        // Handle error case
        console.log(xhr.responseText);
      }
    });
  }

  // Event listener for the "Supprimer" button
  $('.btn-danger').click(function () {
    var itemId = $(this).data('item-id');
    var itemType = $(this).data('item-type');

    // Call the removeItem function
    removeItem(itemId, itemType);
  });

  // Event listener for quantity change
  $('input.quantity').on('input', function () {
    calculateTotal();
  });

  // Calculate and update the total price in the recapitulatif card
  function calculateTotal() {
    var totalPrice = 0;

    $('table tbody tr').each(function () {
      var price = parseFloat($(this).find('.price').text());
      var quantity = parseInt($(this).find('input.quantity').val());

      var total = price * quantity;
      $(this).find('.total').text(total.toFixed(2) + ' €');

      totalPrice += total;
    });

    // Update the total in the recapitulatif card
    $('#total-commande').text(totalPrice.toFixed(2) + ' €');
    updateTotalToPay(totalPrice);
  }

  // Calculate and update the "Total à payer" value
  function updateTotalToPay(totalPrice) {
    var livraison = 5; // Example delivery cost, you can update it according to your logic
    var totalToPay = totalPrice + livraison;

    // Update the "Total à payer" value in the recapitulatif card
    $('#total-payer').text(totalToPay.toFixed(2) + ' €');
    $('#livraison').text(livraison.toFixed(2) + ' €');
  }

  // Initial calculation on page load
  calculateTotal();
});

    </script>
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
                    $stmt = $connection->prepare("SELECT id_Menu, Label, Prix, FK_Restaurant, nom FROM Menu M, restaurant r WHERE M.FK_Restaurant=r.id_restaurant AND id_Menu = ?");
                    $stmt->bind_param("i", $menuId);
                    $stmt->execute();
                    $menuResult = $stmt->get_result();
                    $menu = $menuResult->fetch_assoc();

                    if ($menu) {
                        $itemId = $menu['id_Menu'];
                        $itemName = $menu['Label'];
                        $restaurantId = $menu['nom'];
                        $price = $menu['Prix'];
                        $quantity = 1; // Example quantity, you can fetch it from the session or update it dynamically
                        $total = $price * $quantity;
                    } else {
                        // Handle the case where the menu item doesn't exist in the database
                        $itemId = '';
                        $itemName = "Menu item not found";
                        $restaurantId = '';
                        $price = 0;
                        $quantity = 0;
                        $total = 0;
                    }
                    ?>
                    <tr id="row_<?php echo $itemId; ?>">
                        <td><?php echo $itemName; ?></td>
                        <td><?php echo $restaurantId; ?></td>
                        <td class="price"><?php echo $price; ?> €</td>
                        <td><input type="number" value="<?php echo $quantity; ?>" min="1" max="10"
                                   class="form-control quantity"></td>
                        <td class="total"><?php echo $total; ?> €</td>
                        <td>
                            <button type="button" class="btn btn-danger"
                                    data-item-id="<?php echo $itemId; ?>"
                                    data-item-type="menu">Supprimer
                            </button>
                        </td>
                    </tr>
                    <?php
                }

                // Retrieve product items from the database
                foreach ($cartProduit as $produitId) {
                    $stmt = $connection->prepare("SELECT id_Produit, Label, Prix, FK_Restaurant, nom FROM Produit P, restaurant r WHERE P.FK_Restaurant=r.id_restaurant AND id_Produit = ?");
                    $stmt->bind_param("i", $produitId);
                    $stmt->execute();
                    $produitResult = $stmt->get_result();
                    $produit = $produitResult->fetch_assoc();

                    if ($produit) {
                        $itemId = $produit['id_Produit'];
                        $itemName = $produit['Label'];
                        $restaurantId = $produit['nom'];
                        $price = $produit['Prix'];
                        $quantity = 1; // Example quantity, you can fetch it from the session or update it dynamically
                        $total = $price * $quantity;
                    } else {
                        // Handle the case where the product item doesn't exist in the database
                        $itemId = '';
                        $itemName = "Product item not found";
                        $restaurantId = '';
                        $price = 0;
                        $quantity = 0;
                        $total = 0;
                    }
                    ?>
                    <tr id="row_<?php echo $itemId; ?>">
                        <td><?php echo $itemName; ?></td>
                        <td><?php echo $restaurantId; ?></td>
                        <td class="price"><?php echo $price; ?> €</td>
                        <td><input type="number" value="<?php echo $quantity; ?>" min="1" max="10"
                                   class="form-control quantity"></td>
                        <td class="total"><?php echo $total; ?> €</td>
                        <td>
                            <button type="button" class="btn btn-danger"
                                    data-item-id="<?php echo $itemId; ?>"
                                    data-item-type="produit">Supprimer
                            </button>
                        </td>
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
                    <p class="card-text">Total de la commande : <span id="total-commande">0</span></p>
                    <p class="card-text">Livraison : <span id="livraison">0</span></p>
                    <p class="card-text">Total à payer: <span id="total-payer">0</span></p>
                    <a href="paye.php" class="btn btn-primary">Payer</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "end.php" ?>
</body>
</html>
