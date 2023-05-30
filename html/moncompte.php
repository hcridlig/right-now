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

  <div class="container" style="margin-top: 8em; margin-bottom: 8em;">
    <div class="card">
      <h5 class="card-header">Informations du compte</h5>
      <div class="card-body">
        <div class="form-group">
          <label for="nom_utilisateur">Nom:</label>
          <input type="text" class="form-control" id="nom_utilisateur" readonly>
        </div>
        <div class="form-group">
          <label for="email_utilisateur">Email:</label>
          <input type="email" class="form-control" id="email_utilisateur" readonly>
        </div>
        <div class="form-group">
          <label for="date_naissance_utilisateur">Date de naissance:</label>
          <input type="text" class="form-control" id="date_naissance_utilisateur" readonly>
        </div>
        <div class="form-group">
          <label for="adresse_utilisateur">Adresse:</label>
          <textarea class="form-control" id="adresse_utilisateur" readonly></textarea>
        </div>
        <div class="form-group">
          <button class="btn btn-danger" id="btn_supprimer">Supprimer le compte</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Récupérer les informations de l'utilisateur depuis le backend
    // Remplacez les valeurs factices ci-dessous par les vraies données de l'utilisateur

    var utilisateur = {
      nom: "John Doe",
      email: "john.doe@example.com",
      dateNaissance: "01/01/1990",
      adresse: "123 Rue de l'Exemple, Ville, Pays"
    };

    // Mettre à jour les éléments HTML avec les informations de l'utilisateur

    document.getElementById("nom_utilisateur").value = utilisateur.nom;
    document.getElementById("email_utilisateur").value = utilisateur.email;
    document.getElementById("date_naissance_utilisateur").value = utilisateur.dateNaissance;
    document.getElementById("adresse_utilisateur").value = utilisateur.adresse;

    // Gérer l'événement de clic du bouton de suppression du compte

    document.getElementById("btn_supprimer").addEventListener("click", function() {
      // Code pour supprimer le compte utilisateur ici
      alert("Le compte a été supprimé.");
    });
  </script>

<?php require_once 'end.php'; ?>

</body>
</html>
