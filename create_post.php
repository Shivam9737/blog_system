<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 500px;">
        <h1 class="text-center">Create Post</h1>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="title" class="form-control" placeholder="Post Title" required>
            </div>
            <div class="mb-3">
                <textarea name="content" class="form-control" rows="5" placeholder="Post Content" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Create</button>
        </form>
    </div>
</body>
</html>


