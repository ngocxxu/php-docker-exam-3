<?php
require 'index.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liet ke Khach Hang</title>
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
  <h1>Trang liet ke Khach Hang</h1>

  <label for="soKH">So luong khach hang: </label>
  <input type='number' name="soKH" id="soKH" /></br>

  <table>
    <thead>
      <tr>
        <th>STT</th>
        <th>Ma DH</th>
        <th>Ten KH</th>
        <th>Tong tien thue</th>
      </tr>
    </thead>

    <tbody></tbody>
  </table>

  <script>
    $(document).ready(function() {
      $("#soKH").keydown(function() {
        // Khi nhấn phím Tab
        if (event.keyCode === 9) {
          event.preventDefault();
          const soKH = $(this).val();

          $.ajax({
            url: "code.php",
            type: "GET",
            data: {
              soKH: soKH
            },
            success: function(response) {
              const ds = JSON.parse(response);
              const tableBody = $("tbody");
              tableBody.empty();

              for (let i = 0; i < ds.length; i++) {
                const sp = ds[i];
                const row = `
                  <tr>
                    <td>${i + 1}</td>
                    <td>${sp.MAKH}</td>
                    <td>${sp.TENKH}</td>
                    <td>${sp.TONGTIENTHUE}</td>
                  </tr>
                  `

                tableBody.append(row);
              }
            },
          });

        }

      });
    });
  </script>
</body>

</html>