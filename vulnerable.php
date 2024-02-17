<?php
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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get product name from form
    $product_name = $_POST['product_name'];

    // Construct SQL query using user input
    $sql = "SELECT * FROM products WHERE name = '$product_name'";

    // Execute the query
    $result = $conn->query($sql);

    // Display results
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Description: " . $row["description"] . "<br>";
        }
    } else {
        echo "0 results";
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Product Search</title>
</head>

<body>
    <h2>Search for a Product</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Product Name: <input type="text" name="product_name">
        <input type="submit">
    </form>
    <p>Try searching for a product using its name. You can also try a SQL injection attack by entering something like: <strong>' OR 1=1; --</strong></p>
</body>

</html>