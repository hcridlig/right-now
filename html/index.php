<?php session_start(); 
require 'Scripts/session.php';?>


<!DOCTYPE html>
<html>
<head>
  <title>Right Now</title>
  <!--<link href="resultat.css" rel="stylesheet" type="text/css">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
  
<body>
  <style>
    .card-img-top {
      height: 200px; /* Adjust the height as per your requirement */
      object-fit: cover; /* Ensure the image covers the container */
    }
    .line-container {
      background-color: #aab6fa; /* Light blue color */
      border-radius: 10px; /* Rounded corners */
      padding: 20px; /* Adjust the padding as per your requirement */
      margin-bottom: 20px; /* Adjust the margin as per your requirement */
    }

    .container{
      margin-top: 100px;
    }

    
  </style>


  <?php require_once 'nav.php'; ?>

  <div class="container">
    <section id="restaurant-section">
      <h2>Restaurants</h2>
      <?php
      require_once 'Scripts/connection_db.php';
      $sql = "SELECT * FROM restaurant LIMIT 9";
      $result = $connection->query($sql);

      if (mysqli_num_rows($result) == 0) {
        echo '<p>Aucun résultat trouvé</p>';
      } else {
        $counter = 0; // Counter to keep track of the number of results
        while ($row = mysqli_fetch_assoc($result)) {
          $name = $row['nom'];
          //$description = $row['description'];
          $distance = $row['adresse'];
          $rating = $row['note'];
          $imageURL = $row['image'];
          //$imageURL = 'images/restaurant.jpg';

          if ($counter % 3 == 0) {
            echo '<div class="line-container"><div class="row">';
          }

          echo '<div class="col-md-4">
                  <div class="card mb-3" style="max-width: 550px;">
                    <img src="'.$imageURL.'" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">' . $name . '</h5>
                      <p class="card-text">Description</p>
                      <p class="card-text"><small class="text-body-secondary">' . $distance . ' Km de distance</small></p>
                      <div class="rating">
                        <img src="images/star.png" alt="Star">
                        <p>' . $rating . ' (200+)</p>
                      </div>
                      <button type="button">Voir le menu</button>
                    </div>
                  </div>
                </div>';

          if ($counter % 3 == 2 || $counter == mysqli_num_rows($result) - 1) {
            echo '</div></div>';
          }

          $counter++;
        }
      }
      ?>

    </section>
  </div>

  <?php require_once 'end.php'; ?>
  
</body>
</html>
