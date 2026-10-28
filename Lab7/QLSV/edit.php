<?php
// edit.php - Sửa thông tin sinh viên (UPDATE)
require "db.php";

$id = (int) $_GET["id"];   // ép kiểu số nguyên cho an toàn

// 1. Xử lý khi người dùng bấm "Cập nhật"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mssv = $_POST["mssv"];
    $hoten = $_POST["hoten"];
    $ngaysinh = $_POST["ngaysinh"];
    $email = $_POST["email"];
    $nganh = $_POST["nganh"];

    $stmt = mysqli_prepare($conn, "UPDATE sinhvien SET mssv=?, hoten=?, ngaysinh=?, email=?, nganh=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sssssi", $mssv, $hoten, $ngaysinh, $email, $nganh, $id);
    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit;
}

// 2. Lấy dữ liệu cũ để điền sẵn vào form
$result = mysqli_query($conn, "SELECT * FROM sinhvien WHERE id = $id");
$sv = mysqli_fetch_assoc($result);

if (!$sv) {
    die("Không tìm thấy sinh viên!");
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa sinh viên</title>
</head>

<body>
    <h2>Sửa thông tin sinh viên</h2>
    <form method="post">
        MSSV:
        <input type="text" name="mssv" value="<?= htmlspecialchars($sv["mssv"]) ?>" required><br><br>

        Họ tên:
        <input type="text" name="hoten" value="<?= htmlspecialchars($sv["hoten"]) ?>" required><br><br>

        Ngày sinh:
        <input type="date" name="ngaysinh" value="<?= htmlspecialchars($sv["ngaysinh"]) ?>"><br><br>
        Email:
        <input type="email" name="email" value="<?= htmlspecialchars($sv["email"]) ?>"><br><br>

        Ngành:
        <input type="text" name="nganh" value="<?= htmlspecialchars($sv["nganh"]) ?>"><br><br>

        <button type="submit">Cập nhật</button>
        <button href="index.php">Quay lại</button>
    </form>
</body>

</html>