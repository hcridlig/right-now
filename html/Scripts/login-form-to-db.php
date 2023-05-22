<?php
require_once 'env_retrieve.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform data validation
    if (empty($email) || empty($password)) {
        // Redirect back to the login page with an error message
        header("Location: login.html?error=Veuillez remplir tous les champs");
        exit;
    }

    // Retrieve the hashed password from the database based on the provided email
    // Replace this with your own database logic
    $servername = $DB_HOST;
    $username = $DB_USER;
    $password_db = $DB_PASS;
    $dbname = "projet";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching user is found
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, user is authenticated
            // Redirect to the dashboard or desired page
            $_SESSION['email'] = $email;
            header("Location: ../test1.php");
            exit;
        }
    }

    // Redirect back to the login page with an error message
    header("Location: ../login.php?error=Email ou mot de passe incorrect");
    exit;
}
else {
    // If the form was not submitted, redirect back to the previous page
    header("Location: ../login.php");
    exit;
}
?>
