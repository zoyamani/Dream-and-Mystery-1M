<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $tags = $_POST['tags'];
    $hashtags = $_POST['hashtags'];
    $video_link = !empty($_POST['video_link']) ? $_POST['video_link'] : NULL;
    $image_link = NULL;

    // Image Upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = '../uploads/';
        $image_name = time() . "_" . basename($_FILES['image']['name']);
        $image_link = $upload_dir . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $image_link);
    }

    // Insert Data into Database
    $stmt = $conn->prepare("INSERT INTO blogs (title, content, tags, hashtags, image_link, video_link) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $content, $tags, $hashtags, $image_link, $video_link);
    $stmt->execute();
    echo "<p class='success-message'>Blog added successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .success-message {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Blog</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="title">Blog Title</label>
            <input type="text" name="title" id="title" placeholder="Enter blog title" required>

            <label for="content">Content</label>
            <textarea name="content" id="content" rows="6" placeholder="Enter blog content" required></textarea>

            <label for="hashtags">Hashtags (comma-separated)</label>
            <input type="text" name="hashtags" id="hashtags" placeholder="e.g., #dream, #interpretation" required>

            <label for="tags">Tags (comma-separated)</label>
            <input type="text" name="tags" id="tags" placeholder="e.g., dream, meaning, interpretation" required>

            <label for="image">Upload Image</label>
            <input type="file" name="image" id="image">

            <label for="video_link">Video Link (Optional)</label>
            <input type="text" name="video_link" id="video_link" placeholder="e.g., https://youtu.be/xyz">

            <button type="submit">Add Blog</button>
        </form>
    </div>
</body>
</html>
