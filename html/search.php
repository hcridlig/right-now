<?php
require_once 'Scripts/env_retrieve.php';

// Establish a connection to the MySQL database
$servername = $DB_HOST;
$username = $DB_USER;
$password = $DB_PASS;
$dbname = "projet";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the search query from the POST request
$query = $_POST['query'];

// Perform the search in the database
$sql = "SELECT * FROM restaurant WHERE nom LIKE '%".$query."%'";
$result = $conn->query($sql);

// Display the search results
$count = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='result-item'><p>".$row['nom']."</p></div>";
        $count++;
        if ($count === 3) {
            break;
        }
    }
} else {
    echo "<p>Aucun résultat.</p>";
}


$conn->close();
?>
