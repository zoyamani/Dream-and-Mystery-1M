<?php
include 'db_connection.php';

// ایک سادہ کوئری کریں
$sql = "SELECT * FROM comments"; // آپ کا ٹیبل جسے آپ نے بنایا ہے
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Comment: " . $row["comment_text"]. "<br>";
    }
} else {
    echo "کوئی ریکارڈ نہیں ملا۔";
}

$conn->close();
?>
