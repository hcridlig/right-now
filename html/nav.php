<!DOCTYPE html>
<html>
<head>
  <link href="nav.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  .search-results-container {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    background-color: white;
    border: 1px solid #ddd;
    border-top: none;
    max-height: 200px;
    overflow: hidden;
    z-index: 9999;
    width: 40em;
  }

  .result-item {
    display: block;
    margin-bottom: 10px;
    background-color: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
    text-decoration: none;
    color: #333;
    position: relative;
  }

  .result-item:hover {
    background-color: #e9ecef;
  }
</style>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" >
    <a class="navbar-brand" href="index.php">Right Now</a>
    <form class="d-flex">
      <input class="form-control me-2" type="search" id="search" placeholder="Recherchez un restaurant" aria-label="Search" style="width: 40em;">
      <div id="search-results" class="search-results-container"></div>
      <button class="btn btn-outline-success" type="submit" id="search-button">Rechercher</button>
    </form>
    <div class="ml-auto">
      <?php if ($email=="") { ?>
      <div class="btn-group ml-auto" style="padding-top: 0.5em;">
        <button class="btn btn-primary rounded-btn me-2" type="button" onclick="location.href='login.php';">Login</button>
      </div>
      <div class="btn-group ml-auto" style="padding-top: 0.5em;">
        <button class="btn btn-primary rounded-btn" type="button" onclick="location.href='signup.php';">Sign up</button>
      </div>
      <?php } ?>
      <a href="#" id="openBtn">
          <span class="burger-icon">
            <span></span>
            <span></span>
            <span></span>
          </span>
      </a>  
    </div>
  </nav>

  <div id="mySidenav" class="sidenav">
    <a id="closeBtn" href="#" class="close">X</a>
    <ul>
      <li><a href="moncompte.php">Mon compte</a></li>
      <li><a href="recap.php">Historique</a></li>
      <li><a href="panier.php">Panier</a></li>
      <li><a href="#"></a></li>
    </ul>
  </div>

  <script type="text/javascript">
    var sidenav = document.getElementById("mySidenav");
    var openBtn = document.getElementById("openBtn");
    var closeBtn = document.getElementById("closeBtn");

    openBtn.onclick = openNav;
    closeBtn.onclick = closeNav;

    /* Set the width of the side navigation to 250px */
    function openNav() {
      sidenav.classList.add("active");
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
      sidenav.classList.remove("active");
    }
  </script>

<script>
  $(document).ready(function() {
    var timer;
    var searchResults = $('#search-results');
    var searchContainer = $('#search');
    var searchButton = $('#search-button');
    
    searchContainer.on('keyup', function() {
      clearTimeout(timer);
      var query = $(this).val();

      if (query === '') {
        searchResults.empty().hide();
      } else {
        timer = setTimeout(function() {
          $.ajax({
            url: 'search.php',
            method: 'POST',
            data: { query: query },
            success: function(response) {
              searchResults.html(response).show();
            }
          });
        }, 30);
      }
    });

    searchContainer.on('keypress', function(event) {
      if (event.which == 13) {
        var query = $(this).val();
        window.location.href = 'resultat.php?query=' + query;
        return false;
      }
    });

    searchButton.on('click', function(event) {
      event.preventDefault(); // Prevent default form submission behavior
      var query = searchContainer.val();
      window.location.href = 'resultat.php?query=' + query;
    });

    $(document).on('click', function(event) {
      if (!searchContainer.is(event.target) && !searchResults.is(event.target) && searchResults.has(event.target).length === 0) {
        searchResults.hide();
      }
    });
  });
</script>



</body>
</html>
