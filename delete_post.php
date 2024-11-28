<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = $_POST['post_id'];

    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
}


$_SESSION['success_message'] = "Post created successfully!";
$_SESSION['error_message'] = "Failed to create post.";

header("Location: dashboard.php");
?>
