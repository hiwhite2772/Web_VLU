<?php
// index.php - Hiển thị danh sách sinh viên (READ)
require "db.php";

$result = mysqli_query($conn, "SELECT * FROM sinhvien ORDER BY id");
$tongSoSinhVien = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
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
    <h2>Danh sách sinh viên</h2>
    <a href="add.php">+ Thêm sinh viên</a>
    <br><br>
    <p>Tổng số sinh viên: <?= $tongSoSinhVien ?></p>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>MSSV</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Email</th>
            <th>Ngành</th>
            <th>Thao tác</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= htmlspecialchars($row["mssv"]) ?></td>
                <td><?= htmlspecialchars($row["hoten"]) ?></td>
                <th><?= htmlspecialchars($row["ngaysinh"]) ?></th>
                <td><?= htmlspecialchars($row["email"]) ?></td>
                <td><?= htmlspecialchars($row["nganh"]) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row["id"] ?>">Sửa</a> |
                    <a href="delete.php?id=<?= $row["id"] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>