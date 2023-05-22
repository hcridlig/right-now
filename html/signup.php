<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        <div class="input-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="fas fa-eye-slash toggle-password"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="fas fa-eye-slash toggle-password"></i>
            </span>
          </div>
        </div>
      </div>
      <p>Vous avez déjà un compte ? <a href="login.php">Login</a></p>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Sign up</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      // Toggle password visibility
      $('.toggle-password').click(function() {
        const passwordInput = $(this).closest('.input-group').find('.form-control');
        const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
        passwordInput.attr('type', type);
        $(this).toggleClass('fa-eye-slash fa-eye');
      });
    });
  </script>
</body>

</html>
