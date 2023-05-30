<?php
require_once 'env_retrieve.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Perform data validation
    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        // Redirect back to the previous page with an error message
        header("Location: ../signup.php?error=Veuillez remplir tous les champs");
        exit;
    }

    // Validate password and confirm password
    if ($password !== $confirmPassword) {
        // Redirect back to the previous page with an error message
        header("Location: ../signup.php?error=Les mots de passe ne correspondent pas");
        exit;
    }

    // Insert the data into the database (you need to set up your database connection)
    $servername = $DB_HOST;
    $username = $DB_USER;
    $password_db = $DB_PASS;
    $dbname = "projet";

    // Create a new database connection
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Hash the password
    $password = password_hash($password, CRYPT_SHA512);

    try {
        $conn->query("SELECT * FROM users WHERE email = '$email'");
        if ($conn->affected_rows > 0) {
            header("Location: ../signup.php?error=Email déjà utilisé");
            exit;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    // Execute the statement
    $stmt->execute();

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();

    // Redirect to a success page
    header("Location: ../index.php");
    exit;
} else {
    // If the form was not submitted, redirect back to the previous page
    header("Location: ../signup.php");
    exit;
}
?>
