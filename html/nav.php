<!DOCTYPE html>
<html>
<head>
  <link href="nav.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" >
    <!--<div class="container" style="width: 100vw; padding-right: 0; padding-left: 0;">-->
      <a class="navbar-brand" href="test2.php">Right Now</a>
      <form class="d-flex">
        <input class="form-control me-2" type="search" id="search" placeholder="Recherchez un restaurant" aria-label="Search" style="width: 40em;">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
      </form>
      <div class="ml-auto">
        <div class="btn-group ml-auto" style="padding-top: 0.5em;">
          <button class="btn btn-primary rounded-btn me-2" type="button" onclick="location.href='login.php';">Login</button>
        </div>
        <div class="btn-group ml-auto" style="padding-top: 0.5em;">
          <button class="btn btn-primary rounded-btn" type="button" onclick="location.href='signup.php';">Sign up</button>
        </div>
        <a href="#" id="openBtn">
            <span class="burger-icon">
              <span></span>
              <span></span>
              <span></span>
            </span>
        </a>  
      </div>
    <!--</div>-->
  </nav>

  <div id="mySidenav" class="sidenav">
    <a id="closeBtn" href="#" class="close">X</a>
    <ul>
      <li><a href="#">A propos</a></li>
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
    $(document).ready(function(){
      var timer;

        $('#search').keyup(function(){
            clearTimeout(timer);
            var query = $(this).val();

            if (query === '') {
                $('#search-results').empty(); // Clear the search results
            } 
            else {
                timer = setTimeout(function() {
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {query: query},
                        success: function(response){
                            $('#search-results').html(response);
                        }
                    });
                }, 30);
            }
        });

        $('#search').keypress(function(event) {
            if (event.which == 13) { // Enter key pressed
                var query = $(this).val();
                window.location.href = 'resultat.php?query=' + query; // Redirect to result.html with query parameter
                return false; // Prevent form submission
            }
        });
     });
  </script>

</body>
</html>
