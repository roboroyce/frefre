<?php
// Establishing a connection to the database (Assuming MySQL)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handling user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Vulnerable SQL query
  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // User is authenticated
    echo "Login successful!";
  } else {
    // Authentication failed
    echo "Invalid username or password";
  }
}

$conn->close();
?>
