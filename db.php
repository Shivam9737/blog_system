<?php
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your MySQL password if needed
$database = "blog_system";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
