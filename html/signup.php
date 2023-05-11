<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    html,
    body {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
  <title>Création compte</title>
</head>

<body>
  <div class="container">
    <h2>Création de votre compte</h2>
    <form action="Scripts/signup-form-to-db.php" method="POST">
      <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_GET['error']; ?>
        </div> <?php }
        ?>
        
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Name">
      </div>
      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password">
      </div>
      <p>Vous avez déja un compte ?  <a href="login.php">Login</a></p>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Sign up</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.trunk.min.js"></script>




</body>

</html>
