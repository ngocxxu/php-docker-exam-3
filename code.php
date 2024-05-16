<?php
include "index.php";

// ***** TẠO KHÁCH HÀNG *****
if (isset($_POST['them_kh'])) {
  // Nhan du lieu tu form
  $makh = $_POST['makh'];
  $tenkh = $_POST['tenkh'];
  $sodt = $_POST['sodt'];
  $cccd = $_POST['cccd'];

  $sql = "INSERT INTO KHACHHANG(MAKH,TENKH, SDT,CCCD) VALUES ('$makh', '$tenkh', '$sodt', '$cccd')";

  $query = mysqli_query($con, $sql);
  if ($query) {
    echo "<h3>Them thanh cong</h3>";
  }
}

// ***** TẠO HÓA ĐƠN *****
if (isset($_POST['them_hd'])) {
  $mahd = $_POST['mahd'];
  $tenhd = $_POST['tenhd'];
  $makh = $_POST['makh'];
  $tongtien = $_POST['tongtien'];

  $sql = "INSERT INTO HOADON(MAHD,TENHD,MAKH,TONGTIEN)
          VALUES ('$mahd', '$tenhd', '$makh','$tongtien')";

  $query = mysqli_query($con, $sql);
  if ($query) {
    echo "<h3>Them thanh cong</h3>";
  }
}

// ***** XÓA PHÒNG *****
if (isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
  $maphong = $_POST['maphong'];

  $sql = "DELETE FROM PHONG P WHERE P.MAPHONG = '$maphong'";
  $query = mysqli_query($con, $sql);
}

// ***** CẬP NHẬT PHÒNG *****
if (isset($_POST['update_phong'])) {
  $maphong = $_POST['maphong'];
  $tenphong = $_POST['tenphong'];
  $tinhtrang = $_POST['tinhtrang'];
  $loaiphong = $_POST['loaiphong'];

  // Cập nhật bảng PHONG
  $sql = "UPDATE PHONG
          SET MAPHONG='$maphong', TENPHONG='$tenphong', TINHTRANG='$tinhtrang', LOAIPHONG='$loaiphong'
          WHERE MAPHONG='$maphong'";
  $query = mysqli_query($con, $sql);


  if ($query) {
    echo "<h3>Cap nhat thanh cong</h3>";
  } else {
    echo "<h3>Co loi xay ra khi cap nhat</h3>";
  }
}

// ***** LIỆT KÊ KHÁCH HÀNG *****
if (isset($_GET["soKH"])) {
  $soKH = $_GET["soKH"];

  $sql = "SELECT KH.MAKH, KH.TENKH, SUM(HD.TONGTIEN) AS TONGTIENTHUE
          FROM HOADON HD
          JOIN KHACHHANG KH ON KH.MAKH = HD.MAKH
          GROUP BY KH.MAKH, KH.TENKH
          ORDER BY TONGTIENTHUE DESC
          LIMIT $soKH";

  $query = mysqli_query($con, $sql);

  $products = array();

  while ($row = $query->fetch_assoc()) {
    $products[] = $row;
  }

  echo json_encode($products);
}
