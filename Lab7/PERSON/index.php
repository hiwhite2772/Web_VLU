<?php
require "db.php";

$sql = "SELECT * FROM person ORDER BY id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Website PHP</title>

  <style>
    body {
      margin: 20px;
      font-family: "Cambria", serif;
    }

    h2 {
      font-size: 36px;
    }

    p {
      font-size: 20px;
      margin-bottom: 30px;
    }

    .menu {
      display: flex;
      gap: 8px;
    }

    .menu a {
      font-size: 22px;
      text-decoration: none;
      border: 1px solid blue;
      border-radius: 15px;
      padding: 5px 10px;
      color: blue;
    }

    .menu a.active {
      background-color: red;
      color: yellow;
    }

    .menu a:hover {
      background-color: aquamarine;
      color: black;
    }

    .crud {
      margin-top: 20px;
    }

    .crud a {
      text-decoration: none;
      font-family: "Cambria", serif;
      font-size: 18px;
      padding: 8px 18px;
      border-radius: 10px;
    }

    .add {
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .update {
      font-weight: bold;
      color: #2196F3;
      text-decoration: none;
    }

    .delete {
      font-weight: bold;
      color: #ff3c2e;
      text-decoration: none;

    }

    .update:hover {
      font-weight: bold;
      color: orange;
    }

    .delete:hover {
      font-weight: bold;
      color: orange;
    }

    .crud a:hover {
      background-color: yellow;
      color: black;
    }

    table {
      margin-top: 25px;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid black;
      padding: 8px 15px;
    }
  </style>
</head>

<body>

  <div class="menu">
    <a href="index.php" class="active">Giới thiệu</a>
    <a href="lienhe.php">Liên hệ</a>
    <a href="hethongphanphoi.php">Hệ thống phân phối</a>
  </div>

  <hr>

  <h2>Giới thiệu</h2>

  <p>Đây là trang giới thiệu công ty.</p>

  <div class="crud">
    <a href="add.php" class="add">Add New</a>
  </div>

  <h2>Danh sách</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>MSSV</th>
      <th>Họ tên</th>
      <th>Thao tác</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

      <tr>
        <td>
          <?= htmlspecialchars($row["id"]) ?>
        </td>

        <td>
          <?= htmlspecialchars($row["mssv"]) ?>
        </td>

        <td>
          <?= htmlspecialchars($row["hoten"]) ?>
        </td>

        <td>
          <a href="update.php?id=<?= $row["id"] ?>" class="update">
            Sửa
          </a>
          |
          <a href="delete.php?id=<?= $row["id"] ?>" class="delete"
            onclick="return confirm('Bạn có chắc muốn xóa không?');">
            Xóa
          </a>
        </td>
      </tr>

    <?php } ?>

  </table>

</body>

</html>