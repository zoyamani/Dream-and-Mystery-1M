<?php
$servername = "localhost"; // یا 127.0.0.1
$username = "root";        // XAMPP کا ڈیفالٹ یوزر
$password = "";            // XAMPP میں ڈیفالٹ کوئی پاس ورڈ نہیں ہوتا
$dbname = "your_database_name"; // آپ کا ڈیٹا بیس کا نام

// کنیکشن بنائیں
$conn = new mysqli($servername, $username, $password, $dbname);

// کنیکشن چیک کریں
if ($conn->connect_error) {
    die("کنیکشن ناکام: " . $conn->connect_error);
}
echo "کنیکشن کامیاب!";
?>
