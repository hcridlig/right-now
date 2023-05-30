<?php session_start(); 
require 'Scripts/session.php';?>

<!DOCTYPE html>
<html>
<head>
  <title>Récapitulatif de commandes</title>
  <!-- Ajouter le lien vers le fichier css de bootstrap -->
  <link href="recap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <?php require "nav.php";
  
  require_once 'Scripts/env_retrieve.php';
  
  $servername = $DB_HOST;
  $username = $DB_USER;
  $password_db = $DB_PASS;
  $dbname = "projet";

  $conn = new mysqli($servername, $username, $password_db, $dbname);

  // Check for connection errors
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  
  $stmt = $conn->prepare("SELECT C.id_Commande, C.date, M.Prix, R.nom
  FROM Menu M, Menu_Commande MC, Commande C, restaurant R
  WHERE M.id_Menu=MC.FK_Menu AND C.id_Commande=MC.FK_Commande AND R.id_restaurant=M.FK_Restaurant AND C.FK_User=? ORDER BY C.date");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();?>

  <div class="container" style="margin-top: 8em; margin-bottom: 21em;">
    <h1>Historique de commandes</h1>
    <?php
    if ($result->num_rows > 0) {
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Numéro de commande</th>';
    echo '<th>Date</th>';
    echo '<th>Restaurant</th>';
    echo '<th>Prix</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_Commande'] . '</td>';
        echo '<td>' . $row['date'] . '</td>';
        echo '<td>' . $row['nom'] . '</td>';
        echo '<td>' . $row['Prix'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No results found.';
}

// Step 4: Close the database connection
$conn->close();?>
  </div>
  <?php require "end.php" ?>
</body>
</html>