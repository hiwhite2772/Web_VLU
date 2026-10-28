<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $mssv = trim($_POST["mssv"]);
  $hoten = trim($_POST["hoten"]);
  $id = 1;
  $sql = "SELECT id FROM person ORDER BY id";

  $result = mysqli_query($conn,$sql);

  if (!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
  }

  while ($row = mysqli_fetch_assoc($result)) {
    $current_id = (int)$row["id"];

    if ($current_id == $id) {
      $id++;
    } elseif ($current_id > $id) {
      break;
    }
  }
  
  $sql = "INSERT INTO person (id, mssv, hoten) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "iss", $id, $mssv, $hoten);
  
  if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php");
    exit;
  } else {
    die("Lỗi thêm dữ liệu: " . mysqli_stmt_error($stmt));
  }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Add New</title>

  <style>
    body {
      margin: 20px;
      font-family: "Cambria", serif;
    }

    h2 {
      font-size: 36px;
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
      background-color: #4CAF50;
      color: white;
      font-weight: bold;
    }

    button:hover {
      background-color: greenyellow;
      color: black;
    }

    a {
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <h2>Thêm người</h2>

  <form method="post">
    
    <p>
      MSSV:
      <input type="text" name="mssv" required>
    </p>

    <p>
      Họ tên:
      <input type="text" name="hoten" required>
    </p>

    <button type="submit">Add New</button>
    <a href="index.php">Quay lại</a>
  </form>

  <br>


</body>

</html>