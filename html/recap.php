<!DOCTYPE html>
<html>
<head>
  <title>Récapitulatif de commandes</title>
  <!-- Ajouter le lien vers le fichier css de bootstrap -->
  <link href="recap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <?php require "nav.php" ?>

  <div class="container" style="margin-top: 8em; margin-bottom: 21em;">
    <h1>Historique de commandes</h1>
    <!-- Créer un tableau avec bootstrap qui contient les informations des commandes -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Numéro de commande</th>
          <th>Date</th>
          <th>Restaurant</th>
          <th>Prix</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <!-- Remplacer les valeurs par celles de vos commandes -->
        <tr>
          <td>123456</td>
          <td>23/05/2023</td>
          <td>Pizza Hut</td>
          <td>10 €</td>
          <td><button class="supp" type="button" onclick="deleteFunction()">&times;</button>
            <script>
              function deleteFunction() {
                // écrivez votre logique de suppression ici
              }
            </script></td>
        </tr>
        <tr>
          <td>789012</td>
          <td>22/05/2023</td>
          <td>Sushi Shop</td>
          <td>15 €</td>
          <td><button class="supp" type="button" onclick="deleteFunction()">&times;</button>
            <script>
              function deleteFunction() {
                // écrivez votre logique de suppression ici
              }
            </script></td>
        </tr>
        <tr>
          <td>345678</td>
          <td>21/05/2023</td>
          <td>Burger King</td>
          <td>8 €</td>
          <td><button class="supp" type="button" onclick="deleteFunction()">&times;</button>
            <script>
              function deleteFunction() {
                // écrivez votre logique de suppression ici
              }
            </script></td>
        </tr>
      </tbody>
    </table>
  </div>
  <?php require "end.php" ?>
</body>
</html>