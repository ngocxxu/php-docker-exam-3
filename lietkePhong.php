<?php
require 'index.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liet ke Phong</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
</style>

<body>
  <h1>Trang liet ke Phong</h1>

  <table>
    <thead>
      <tr>
        <th>Ma phong</th>
        <th>Ten phong</th>
        <th>Tinh trang</th>
        <th>Loai phong</th>
        <th>Chuc nang</th>
      </tr>
    </thead>

    <tbody>
      <?php

      $sql = "SELECT * FROM PHONG";
      $query = mysqli_query($con, $sql);
      $stt = 1;

      if (mysqli_num_rows($query) > 0) {
        foreach ($query as $item) {
      ?>
          <tr data-maphong="<?= $item['MAPHONG']; ?>">
            <td><?= $item['MAPHONG']; ?></td>
            <td><?= $item['TENPHONG']; ?></td>
            <td><?= $item['TINHTRANG']; ?></td>
            <td><?= $item['LOAIPHONG']; ?></td>

            <td style="display:flex; gap:10px">
              <a href="updatePhong.php?maphong=<?= $item['MAPHONG']; ?>">View</a>
              <button type="button" id="delete">Delete</button>
            </td>
          </tr>
      <?php
        }
      }

      ?>
    </tbody>
  </table>

  <script>
    $(document).ready(function() {
      $("tbody").on("click", "#delete", function() {
        const row = $(this).closest('tr');
        const maphong = row.data('maphong');

        $.ajax({
          url: "code.php",
          type: "POST",
          data: {
            _method: "DELETE",
            maphong: maphong
          },
          success: function(data, status) {
            row.remove();
            alert("Xóa thành công");
          },
        })
      });

    });
  </script>
</body>

</html>