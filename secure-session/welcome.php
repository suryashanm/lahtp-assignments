<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<h2>Welcome, $username!</h2>";
} else {
    header("Location: index.php"); // Redirect to login page if not logged in
}
?>
