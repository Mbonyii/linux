<?php
// Database connection
$host = 'localhost';
$user = 'root';       // Your database username
$password = '';       // Your database password
$database = 'contact_db';  // Your database name

$conn = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and collect form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // SQL query to insert form data into the database
    $query = "INSERT INTO submissions (name, email, message) VALUES ('$name', '$email', '$message')";

    // Execute the query
    if ($conn->query($query) === TRUE) {
        echo "Thank you for your message!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
