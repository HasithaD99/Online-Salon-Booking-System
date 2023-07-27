<?php
$servername = "localhost";
$username = "id19344645_root";
$password = "<r1f/q5[/Y}B21kt";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>