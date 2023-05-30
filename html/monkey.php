<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </head>
<body>

<script>
    setTimeout(function() {
      window.location.href = "index.php"; // Replace with the URL of the destination page
    }, 5000); // 5000 milliseconds = 5 seconds
  </script>

<div class="container">
    <img id="monkeyImage" src="monkey.jpg" class="rotate">
</div>

<h3>Deconnexion en cours</h3>

<style>
.container{
    display: flex;
  justify-content: center;
  align-items: center;
}

.rotate {
  animation: rotation 1s infinite linear;
}

@keyframes rotation {
    0% { transform: rotate(0deg); }
  25% { transform: rotate(-15deg); }
  50% { transform: rotate(0deg); }
  75% { transform: rotate(15deg); }
  100% { transform: rotate(0deg); }
}
h3{
    text-align: center;
}

</style>
</body>
</html>