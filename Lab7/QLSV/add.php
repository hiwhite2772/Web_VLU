<?php
// add.php - Thêm sinh viên mới (CREATE)
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mssv = $_POST["mssv"];
    $hoten = $_POST["hoten"];
    $ngaysinh = $_POST["ngaysinh"];
    $email = $_POST["email"];
    $nganh = $_POST["nganh"];

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO sinhvien (mssv, hoten, ngaysinh, email, nganh) VALUES (?, ?, ?, ?, ?)"
    );
    mysqli_stmt_bind_param($stmt, "sssss", $mssv, $hoten, $ngaysinh, $email, $nganh);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        die("MSSV đã tồn tại!");
    }

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
    <style>
        a {
            text-decoration: none;
        }

        a:hover {
            color: red;
        }

        a:visited {
            color: blue;
        }
    </style>
</head>

<body>
    <h2>Thêm sinh viên</h2>
    <form method="post">
        MSSV:
        <input type="text" name="mssv" required><br><br>

        Họ tên:
        <input type="text" name="hoten" required><br><br>

        Ngày Sinh:
        <input type="date" name="ngaysinh"><br><br>

        Email:
        <input type="email" name="email"><br><br>

        Ngành:
        <input type="text" name="nganh"><br><br>

        <button type="submit">Lưu</button>
        <a href="index.php">Quay lại</a>
    </form>
</body>

</html>