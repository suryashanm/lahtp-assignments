<!DOCTYPE html>
<html>

<head>
    <title>XSS Vulnerability</title>
</head>

<body>
    <h2>Submit a Comment</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <textarea name="comment" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Comments</h2>
    <?php
    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get comment from form
        $comment = $_POST['comment'];

        // Display submitted comment without sanitization
        echo "<p>$comment</p>";
    }
    ?>
    <!-- Explain the XSS vulnerability -->
    <!-- By submitting a comment with a script tag containing JavaScript code, such as: <strong>&lt;script&gt;alert('XSS Attack!');&lt;/script&gt;</strong>, an alert box will be displayed when the webpage is loaded, demonstrating the XSS vulnerability. -->
</body>

</html>