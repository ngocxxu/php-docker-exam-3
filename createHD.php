<?php
require 'index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Them Hoa Don</title>
</head>

<body>
  <h1>Trang them Hoa Don</h1>
  <form method="POST" action="code.php">

    <label for="makh">Ten khach hang:</label>
    <select name="makh" id="makh">
      <?php
      $query = "SELECT * FROM KHACHHANG";
      $query_run = mysqli_query($con, $query);

      if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $item) {
      ?>
          <option value="<?= $item['MAKH']; ?>"><?= $item['TENKH']; ?></option>
      <?php
        }
      }
      ?>
    </select><br />

    <label for="mahd">Ma hoa don:</label>
    <input type="text" id="mahd" name="mahd" /><br />

    <label for="tenhd">Ten hoa don:</label>
    <input type="text" id="tenhd" name="tenhd" /><br />

    <label for="tongtien">Tong tien:</label>
    <input type="text" id="tongtien" name="tongtien" /><br />

    <button type="submit" name="them_hd" class="btn btn-primary">Them</button>
  </form>
</body>

</html>