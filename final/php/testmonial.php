<?php
// Database connection
$servername = "localhost";  // Database server
$username = "root";         // Database username
$password = "";             // Database password (for local environments like XAMPP, it's usually empty)
$dbname = "testimonials_db"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name']));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
    $message = mysqli_real_escape_string($conn, htmlspecialchars($_POST['message']));

    // Prepare SQL query to insert the testimonial
    $sql = "INSERT INTO testimonials (name, email, message) VALUES ('$name', '$email', '$message')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Testimonial submitted successfully!'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "'); window.location.href = 'index.html';</script>";
    }

    // Close connection
    $conn->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'index.html';</script>";
}
?>
