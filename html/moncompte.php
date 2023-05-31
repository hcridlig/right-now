<?php session_start(); 
require 'Scripts/session.php';?>

<!DOCTYPE html>
<html>
<head>
  <title>Informations du compte</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body {
      padding-top: 50px;
    }

    .card {
      max-width: 500px;
      margin: 0 auto;
    }
  </style>
</head>
<body>

    <?php require_once 'nav.php'; ?>

    <?php 
    require_once 'Scripts/connection_db.php';
    $stmt = $connection->prepare("SELECT name, email, address FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $utilisateur = $result->fetch_assoc();

    ?>

  <div class="container" style="margin-top: 8em; margin-bottom: 8em;">
    <div class="card">
      <h5 class="card-header">Informations du compte</h5>
      <div class="card-body">
        <div class="form-group">
          <label for="nom_utilisateur">Nom:</label>
          <input type="text" class="form-control" id="nom_utilisateur" readonly value="<?php echo $utilisateur["name"];?>">
        </div>
        <div class="form-group">
          <label for="email_utilisateur">Email:</label>
          <input type="email" class="form-control" id="email_utilisateur" readonly value="<?php echo $utilisateur["email"];?>">
        </div>
        <div class="form-group">
          <label for="adresse_utilisateur">Adresse:</label>
          <textarea class="form-control" id="adresse_utilisateur" readonly value="<?php echo $utilisateur["address"];?>"></textarea>
        </div>
        <div class="form-group">
          <button class="btn btn-secondary" id="btn_supprimer">Modifier</button>
          <button class="btn btn-danger" id="btn_supprimer">Supprimer le compte</button>
        </div>
      </div>
    </div>
  </div>



<?php require_once 'end.php'; ?>

</body>
</html>
