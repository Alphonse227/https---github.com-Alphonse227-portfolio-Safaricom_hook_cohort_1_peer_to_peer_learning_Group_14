<?php
// Database connection
$servername = "localhost";  // Database server
$username = "root";         // Database username
$password = "";             // Database password (for local environments like XAMPP, it's usually empty)
$dbname = "projects_db";    // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
    $description = mysqli_real_escape_string($conn, htmlspecialchars($_POST['description']));
    $link = mysqli_real_escape_string($conn, htmlspecialchars($_POST['link']));

    // Prepare SQL query to insert the project data
    $sql = "INSERT INTO projects (title, description, link) VALUES ('$title', '$description', '$link')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Project submitted successfully!'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "'); window.location.href = 'index.html';</script>";
    }

    // Close connection
    $conn->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'index.html';</script>";
}
?>
