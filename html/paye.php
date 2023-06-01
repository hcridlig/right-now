<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page de paiement</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body {
      padding: 50px;
    }
  </style>
</head>

<body>

 <?php require_once 'nav.php'; ?>

  <div class="container" style="margin-top: 10em; margin-bottom: 9em;">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="mb-4">Paiement</h2>
        <form>
          <div class="form-group">
            <label for="cardNumber">Numéro de carte</label>
            <input type="text" class="form-control" id="cardNumber" placeholder="Numéro de carte" required>
          </div>
          <div class="form-group">
            <label for="expirationDate">Date d'expiration</label>
            <input type="text" class="form-control" id="expirationDate" placeholder="MM/AA" required>
          </div>
          <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="text" class="form-control" id="cvv" placeholder="CVV" required>
          </div>
          <div class="form-group">
            <label for="cardholderName">Nom du titulaire de la carte</label>
            <input type="text" class="form-control" id="cardholderName" placeholder="Nom du titulaire" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Payer</button>
        </form>
      </div>
    </div>
  </div>

 <?php require_once 'end.php'; ?>

</body>

</html>
