<?php
require 'index.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Them Cong Dan</title>
</head>

<body>
  <h1>Trang them Cong Dan</h1>

  <form method="POST" action="code.php">
    <?php

    if (isset($_GET["maphong"])) {
      $maphong = $_GET["maphong"];
      $sql = "SELECT DISTINCT * FROM PHONG
              WHERE MAPHONG = '$maphong'";
      $query = mysqli_query($con, $sql);

      $item = $query->fetch_assoc();

      if ($query) {
    ?>
        <label for="maphong">Ma phong:</label>
        <input type="text" id="maphong" name="maphong" value="<?= $item['MAPHONG']; ?>" readonly /><br />

        <label for="tenphong">Ten phong:</label>
        <input type="text" id="tenphong" name="tenphong" value="<?= $item['TENPHONG']; ?>" /><br />

        <label for="tinhtrang">Tinh trang:</label>
        <input type="text" id="tinhtrang" name="tinhtrang" value="<?= $item['TINHTRANG']; ?>" /><br />

        <label for="loaiphong">Loai phong:</label>
        <input type="text" id="loaiphong" name="loaiphong" value="<?= $item['LOAIPHONG']; ?>" /><br />

    <?php
      }
    }

    ?>
    <button type="submit" name="update_phong" class="btn btn-primary">Update</button>
  </form>
</body>

</html>