<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $id = (int)$_POST["id"];
  $mssv = $_POST["mssv"];
  $hoten = $_POST["hoten"];

  $sql = "UPDATE person SET mssv=?, hoten=? WHERE id=?";
  $stmt = mysqli_prepare($conn, $sql);

  mysqli_stmt_bind_param($stmt, "ssi", $mssv, $hoten, $id);
  mysqli_stmt_execute($stmt);

  header("Location: index.php");
  exit;
}

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

$sql = "SELECT * FROM person WHERE id=?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if (!$row) {
  die("Không tìm thấy dữ liệu.");
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Cập nhật</title>

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
    }

    input {
      padding: 6px;
      font-family: "Cambria", serif;
      font-size: 18px;
    }

    button {
      padding: 8px 18px;
      margin-right: 20px;
      font-family: "Cambria", serif;
      font-size: 18px;
      cursor: pointer;
      border-radius: 10px;
      background-color: aquamarine;
      font-weight: bold;
    }

    button:hover {
      background-color: #0062c5;
      color: white;
    }

    a {
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <h2>Cập nhật</h2>

  <form method="post">

    <input
      type="hidden"
      name="id"
      value="<?= $row["id"] ?>">


    <p>
      MSSV:
      <input
        type="text"
        name="mssv"
        value="<?= htmlspecialchars($row["mssv"]) ?>"
        required>
    </p>

    <p>
      Họ tên:
      <input
        type="text"
        name="hoten"
        value="<?= htmlspecialchars($row["hoten"]) ?>"
        required>
    </p>

    <button type="submit">Cập nhật</button>
    <a href="index.php">Quay lại</a>

  </form>

  <br>

</body>

</html>