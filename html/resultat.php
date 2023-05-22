<!DOCTYPE html>
<html>
<head>
  <title>Right Now</title>
  <link href="resultat.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
  
<body>
  <nav>
    <div class="nav-item"><a href="test2.html">Right Now</a></div>
    <div class="search-bar">
      <input type="text" placeholder="Recherchez un restaurant">
      <button type="submit">Rechercher</button>
    </div>
    <div>
      <button class="login-btn" type="button" onclick="location.href='login.php';">Login</button>
      <button class="signup-btn" type="button" onclick="location.href='signup.php';">Sign up</button>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <section id="filter-section">
          <h3>Filtrer les restaurants</h3>
          <div class="form-group">
            <label for="distance-filter">Distance</label>
            <select class="form-control" id="distance-filter">
              <option value="">Toutes les distances</option>
              <option value="1">Moins de 1 km</option>
              <option value="5">Moins de 5 km</option>
              <option value="10">Moins de 10 km</option>
            </select>
          </div>
          <div class="form-group">
            <label for="type-filter">Type de restaurant</label>
            <select class="form-control" id="type-filter">
              <option value="">Tous les types</option>
              <option value="italian">Italien</option>
              <option value="french">Français</option>
              <option value="asian">Asiatique</option>
            </select>
          </div>
          <div class="form-group">
            <label for="rating-filter">Notation</label>
            <select class="form-control" id="rating-filter">
              <option value="">Toutes les notations</option>
              <option value="5">5 étoiles</option>
              <option value="4">4 étoiles et plus</option>
              <option value="3">3 étoiles et plus</option>
            </select>
          </div>
          <button class="btn btn-primary">Appliquer les filtres</button>
        </section>
      </div>
      <div class="col-md-9">
        <section id="restaurant-section">
          <h2>Restaurants</h2>
          <div class="row">
            <?php
            require_once 'Scripts/connection_db.php';
            // Assuming you have a database connection
            $query = $_GET['query']; // Assuming you have 'query' as the GET parameter name
            $sql = "SELECT * FROM restaurant WHERE nom LIKE '%$query%'";
            $result = $connection->query($sql);

            if(mysqli_num_rows($result) == 0) {
              echo '<p>Aucun résultat trouvé</p>';
            }
            else{
              while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['nom'];
                //$description = $row['description'];
                $distance = $row['adresse'];
                $rating = $row['note'];
                //$imageURL = $row['image_url'];
                $imageURL = 'images/restaurant.jpg';
              
                echo '<div class="col-md-4">
                        <div class="card mb-3" style="max-width: 550px;">
                          <img src="https://picsum.photos/id/240/200/300" class="card-img-top" alt="...">
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
              }
            }
            
            ?>
          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- Footer section -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4>Contactez-nous</h4>
          <p>123 Rue de la Paix<br>
            75001 Paris<br>
            France<br>
            <a href="mailto:contact@rightnow.com">contact@rightnow.com</a></p>
        </div>
        <div class="col-md-4">
          <h4>Liens utiles</h4>
          <ul>
            <li class="lien"><a href="test2.html">Accueil</a></li>
            <li class="lien"><a href="#">Recherche</a></li>
            <li class="lien"><a href="#">Mon compte</a></li>
            <li class="lien"><a href="#">Aide</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h4>Suivez-nous</h4>
          <ul class="social-media">
            <li><a href="#"><img src="images/facebook.png" alt="Facebook"></a></li>
            <li><a href="#"><img src="images/twitter.png" alt="Twitter"></a></li>
            <li><a href="#"><img src="images/instagram.png" alt="Instagram"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer> 
</body>
</html>
