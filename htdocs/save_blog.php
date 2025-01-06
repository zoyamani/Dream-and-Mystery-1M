<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $title = $_POST['title'];
        $content = $_POST['content'];
        $hashtags = $_POST['hashtags'];
        $image_link = $_POST['image_link'];
        $video_link = $_POST['video_link'];

        // Save the blog data (Here we are saving it in a text file for simplicity)
        $blog_content = "Title: $title\nContent: $content\nHashtags: $hashtags\nImage Link: $image_link\nVideo Link: $video_link\n\n";

        // Save to a file
        file_put_contents("blogs.txt", $blog_content, FILE_APPEND);

        echo "بلاگ کامیابی سے پوسٹ کیا گیا!";
    }
?>
