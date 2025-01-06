<?php
include 'config.php'; // Database connection file

// Fetching all blogs from the database
$query = "SELECT * FROM blogs ORDER BY created_at DESC"; // Fetch all blogs
$result = $conn->query($query);
$blogs = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khawab Ki Tabeer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            direction: rtl; /* Ensures right-to-left layout for Urdu */
        }
        .main-container {
            max-width: 800px;
            width: 100%;
            padding: 20px;
            background: #fff;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .main-container h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .search-bar {
            margin-bottom: 20px;
            text-align: center;
        }
        .search-input {
            width: 100%;
            max-width: 500px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .blog-list .blog-item {
            margin-bottom: 20px;
            padding: 15px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: right; /* Align text to the right for Urdu */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .blog-list .blog-item h2 {
            font-size: 22px;
            color: #007bff;
            margin-bottom: 5px;
        }
        .blog-list .blog-item p {
            margin: 10px 0;
            color: #555;
            text-align: right; /* Align paragraphs to the right */
        }
        .tags, .hashtags {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-top: 10px;
            justify-content: flex-end; /* Align tags and hashtags to the right */
        }
        .tag, .hashtag {
            padding: 5px 10px;
            background: #007bff;
            color: #fff;
            border-radius: 15px;
            font-size: 12px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .tag:hover, .hashtag:hover {
            background: #0056b3;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-end; /* Align numbers to the right */
            gap: 10px;
        }
        .pagination a {
            display: block;
            padding: 8px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
            width: fit-content;
        }
        .pagination a:hover {
            background: #0056b3;
        }
        .scrolling-text {
            position: relative;
            margin-top: 20px;
            padding: 10px;
            background-color: #1a1a1a;
            color: white;
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
            box-sizing: border-box;
            border-radius: 8px;
            animation: scroll-right 20s linear infinite;
            text-align: center; /* Center align scrolling text */
        }
        .scrolling-text span {
            display: inline-block;
        }
        @keyframes scroll-right {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(100%);
            }
        }
    </style>
</head>
<body>

    <div class="main-container">
        <h1>Khawab Ki Tabeer</h1>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" class="search-input" id="searchInput" placeholder="Search by title, tags, or hashtags..." onkeyup="searchBlogs(this.value)">
        </div>

        <!-- Blog List -->
        <div class="blog-list" id="blogList">
            <?php foreach ($blogs as $blog): ?>
                <div class="blog-item">
                    <h2><?php echo htmlspecialchars($blog['title']); ?></h2>
                    <p><?php echo nl2br(htmlspecialchars($blog['content'])); ?></p>
                    <div class="tags">
                        <span class="tag"><?php echo htmlspecialchars($blog['tags']); ?></span>
                    </div>
                    <div class="hashtags">
                        <span class="hashtag"><?php echo htmlspecialchars($blog['hashtags']); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Scrolling Text -->
    <div class="scrolling-text">
        <span>خواب کی تعبیر، روحانی علاج، علمِ اعداد، جادو کا اثر اور اس کا حل، گھر کے مسائل اور ان کا روحانی حل، رزق میں برکت، مشکلات سے نجات اور قرآن و سنت کی رہنمائی جیسے موضوعات پر رہنمائی کے لیے ہم سے رابطہ کریں۔</span>
    </div>

    <script>
        function searchBlogs(query) {
            const blogItems = document.querySelectorAll('.blog-item');
            blogItems.forEach(item => {
                const text = item.innerText.toLowerCase();
                item.style.display = text.includes(query.toLowerCase()) ? 'block' : 'none';
            });
        }
    </script>
</body>
</html>
