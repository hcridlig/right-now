<?php
require_once 'Scripts/session.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Right Now</title>
    <link href="test1.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  
  <body>
    <nav>
      <div class="nav-item">Right Now</div>
      <div class="search-bar">
        <input type="text" placeholder="Recherchez un restaurant">
        <button>Rechercher</button>
      </div>
      <div>
        <?php
        // Check if the user is logged in
        if ($email != "") {
          // User is logged in, display account icon
          ?>
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-fill"></i> Compte
            </a>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
              <li><a class="dropdown-item" href="Scripts/logoff.php">Deconnexion</a></li>
            </ul>
          </div>

          <?php
        } else {
          // User is not logged in, display login and signup buttons
          ?>
          <button class="login-btn" onclick="location.href='login.php';">Login</button>
          <button class="signup-btn" onclick="location.href='signup.php';">Sign up</button>
          <?php
        }
        ?>
      </div>
    </nav>

<section id="lunch-offers" class="restaurant-section">
  <h2>Les offres du midi</h2>

  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="..." class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-4 mb-4">
        <div class="card" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="..." class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-4 mb-4">
        <div class="card" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="..." class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

</section>

<section class="restaurant-section">
  <h2>Les envies de Burgers</h2>
  <div class="restaurant-container">
    <div class="restaurant-card">
        <img src="https://picsum.photos/id/240/200/300" alt="Restaurant 4">
      <h3>Restaurant 4</h3>
        <p>Description du restaurant 4</p>
        <p>123 Main Street<br>New York, NY 10001<br>(123) 456-7890</p>
      <div class="rating">
        <img src="images/star.png" alt="Star">
        <p>4.5 (200+)</p>
    </div>
        <button>Voir le menu</button>
    </div>
    <div class="restaurant-card">
        <img src="https://picsum.photos/id/241/200/300" alt="Restaurant 5">
      <h3>Restaurant 5</h3>
        <p>Description du restaurant 5</p>
        <p>123 Main Street<br>New York, NY 10001<br>(123) 456-7890</p>
      <div class="rating">
        <img src="images/star.png" alt="Star">
        <p>4.5 (200+)</p>
    </div>
        <button>Voir le menu</button>
    </div>
    <div class="restaurant-card">
        <img src="https://picsum.photos/id/242/200/300" alt="Restaurant 6">
      <h3>Restaurant 6</h3>
        <p>Description du restaurant 6</p>
        <p>123 Main Street<br>New York, NY 10001<br>(123) 456-7890</p>
      <div class="rating">
        <img src="images/star.png" alt="Star">
        <p>4.5 (200+)</p>
    </div>
        <button>Voir le menu</button>
    </div>
  </div>
</section>

<section class="restaurant-section">
  <h2>Devant le match</h2>
  <div class="restaurant-container">
    <div class="restaurant-card">
        <img src="https://picsum.photos/id/243/200/300" alt="Restaurant 7">
      <h3>Restaurant 7</h3>
        <p>Description du restaurant 7</p>
        <p>123 Main Street<br>New York, NY 10001<br>(123) 456-7890</p>
      <div class="rating">
        <img src="images/star.png" alt="Star">
        <p>4.5 (200+)</p>
    </div>
        <button>Voir le menu</button>
    </div>
    <div class="restaurant-card">
        <img src="https://picsum.photos/id/244/200/300" alt="Restaurant 8">
      <h3>Restaurant 8</h3>
        <p>Description du restaurant 8</p>
        <p>123 Main Street<br>New York, NY 10001<br>(123) 456-7890</p>
      <div class="rating">
        <img src="images/star.png" alt="Star">
        <p>4.5 (200+)</p>
    </div>
        <button>Voir le menu</button>
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="https://picsum.photos/id/250/200/300" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
</section>

<!-- Footer section -->
<footer>
  <div class="footer-container">
    <div class="footer-info">
      <h3>A propos de Right Now</h3>
      <p>
        Right Now est une plateforme de livraison de nourriture en ligne. Nous avons pour mission de vous apporter une expérience culinaire unique dans le confort de votre maison.
      </p>
    </div>
    <div class="footer-contact">
      <h3>Contactez-nous</h3>
      <p>
        Email: contact@rightnow.com<br>
        Téléphone: +33 1 23 45 67 89<br>
        Adresse: 123 rue de la Gastronomie, Paris
      </p>
    </div>
    <div class="footer-social">
      <h3>Nous suivre</h3>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>
</footer>


</body>
</html>
