<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Liên hệ</title>

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
  }

  .menu a:visited {
    color: blue;
  }

  .menu a:hover {
    background-color: aquamarine;
    color: black;
  }

  .menu a.active {
    background-color: red;
    color: yellow;
  }
  </style>
</head>

<body>

  <div class="menu">
    <a href="index.php">Giới thiệu</a>
    <a href="lienhe.php" class="active">Liên hệ</a>
    <a href="hethongphanphoi.php">Hệ thống phân phối</a>
  </div>

  <hr>

  <h2>Liên hệ</h2>

  <p>Đây là trang liên hệ.</p>

</body>

</html>