<?php
// db.php - Kết nối cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "person", 3307);
 
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}


mysqli_set_charset($conn, "utf8mb4");
?>