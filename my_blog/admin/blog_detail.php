<?php
include 'config.php'; // Database connection file

// Fetch the blog details from the database based on the ID
$blog_id = $_GET['id']; // Get the blog ID from URL

$query = "SELECT * FROM blogs WHERE id = '$blog_id'";
$result = $conn->query($query);
$blog = $result->fetch_assoc();

if (!$blog) {
    echo "Blog not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($blog['title']); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }
        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 25px;
        }
        .content {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }
        .tags {
            font-size: 16px;
            color: #007bff;
        }
        .video {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($blog['title']); ?></h1>

        <div class="content">
            <?php echo nl2br(htmlspecialchars($blog['content'])); ?>
        </div>

        <div class="tags">
            <strong>Tags:</strong> <?php echo htmlspecialchars($blog['tags']); ?>
        </div>

        <?php if ($blog['video_link']) { ?>
        <div class="video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo urlencode($blog['video_link']); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <?php } ?>
    </div>
</body>
</html>
