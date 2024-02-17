<?php
session_start();

// Connect to MySQL database
$servername = "localhost";
$username = "username";
$password = "password";
$database = "dbname";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement with prepared statement
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password); // Bind parameters

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // User exists, create session and store username
        $_SESSION['username'] = $username;
        header("Location: welcome.php"); // Redirect to welcome page
    } else {
        echo "Invalid username or password.";
    }
}

// Close connection
$conn->close();
?>
