<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch posts
$query = "SELECT * FROM posts WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-4">
        <h1 class="mb-4">Dashboard</h1>
        <a href="create_post.php" class="btn btn-primary">Create New Post</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>

        <h2 class="mt-4">Your Posts</h2>
        <div class="list-group">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($post = $result->fetch_assoc()): ?>
                    <div class="list-group-item">
                        <h3><?= htmlspecialchars($post['title']) ?></h3>
                        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                                data-post-id="<?= $post['id'] ?>" data-post-title="<?= htmlspecialchars($post['title']) ?>">
                            Delete
                        </button>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-muted">No posts to display. Create your first post!</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the post "<span id="postTitle"></span>"?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="delete_post.php">
                        <input type="hidden" name="post_id" id="postId">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const postId = button.getAttribute('data-post-id');
            const postTitle = button.getAttribute('data-post-title');
            document.getElementById('postTitle').textContent = postTitle;
            document.getElementById('postId').value = postId;
        });
    </script>
</body>
</html>
