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
  <title>Login</title>
</head>

<body>
  <div class="container">
    <h2>Connexion</h2>
    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_GET['error']; ?>
        </div> <?php }
        ?>
    <form action="Scripts/login-form-to-db.php" method="POST">
      <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      </div>
        <p>Vous n'avez pas de compte ?  <a href="signup.php">Sign up</a></p>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Log in</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
