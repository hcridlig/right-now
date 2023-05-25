  <!DOCTYPE html>
<html>
<head>
	<link href="panier.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
  <body>

    <?php require "nav.php" ?>

    

      <div class="container" style="margin-top: 8em; margin-bottom: 7.5em;">
        <h1 class="text-center" style="margin-bottom: 1em; margin-right: 30em;">Panier</h1>
        <div class="row">
          <div class="col-md-8">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Article</th>
                  <th scope="col">Prix</th>
                  <th scope="col">Quantité</th>
                  <th scope="col">Total</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><img src="https://via.placeholder.com/100x100" alt="Produit 1" class="img-thumbnail"> Produit 1</td>
                  <td>10 €</td>
                  <td><input type="number" value="1" min="1" max="10" class="form-control"></td>
                  <td>10 €</td>
                  <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                </tr>
                <tr>
                  <td><img src="https://via.placeholder.com/100x100" alt="Produit 2" class="img-thumbnail"> Produit 2</td>
                  <td>20 €</td>
                  <td><input type="number" value="2" min="1" max="10" class="form-control"></td>
                  <td>40 €</td>
                  <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                </tr>
                <tr>
                  <td><img src="https://via.placeholder.com/100x100" alt="Produit 3" class="img-thumbnail"> Produit 3</td>
                  <td>30 €</td>
                  <td><input type="number" value="3" min="1" max="10" class="form-control"></td>
                  <td>90 €</td>
                  <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                </tr>
              </tbody>
            </table>
          </div>
  
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Récapitulatif</h5>
                <p class="card-text">Sous-total : 140 €</p>
                <p class="card-text">Livraison : 10 €</p>
                <p class="card-text">Total : 150 €</p>
                <a href="#" class="btn btn-primary">Payer</a>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php require "end.php" ?>
    
  </body>
</html>