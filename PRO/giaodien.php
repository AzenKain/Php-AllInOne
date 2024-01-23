<!doctype html>
<?php
session_start();
require_once('sanpham.php');
global $result;
?>

<html lang="en">

<head>
  <title>Quản trị sản phẩm</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <hr class="jumbotron">
  <h1 class="display-3"> Quản trị sản phẩm </h1>
  <hr class="my-2">
  </hr>
  </div>
</head>

<body>
  <div class="row">
    <div class="col-sm-6">
      <div class="card" >
        <div class="card-body">
          <h5 class="card-title">Thong tin san pham</h5>
          <form action="" method="post">
            <div class="form-control">
              <label for="">Ma SP</label>
              <input type="text" class="form-control" name="txtMaSP" id="txtMaSP" placeholder="Ma san pham"
                aria-label="default input example">
            </div>
            <div class="form-control">
              <label for="">Ten SP</label>
              <input type="text" class="form-control" name="txtTenSP" id="txtTenSP" placeholder="Ten san pham"
                aria-label="default input example">
            </div>
            <div class="form-control">
              <label for="">Don vi tinh</label>
              <input type="text" class="form-control" name="txtDVT" id="txtDVT" placeholder="DVT"
                aria-label="default input example">
            </div>
            <div class="form-control">
              <label for="">Don Gia</label>
              <input type="text" class="form-control" name="txtDonGia" id="txtDonGia" placeholder="Don gia"
                aria-label="default input example">
            </div>
            <div class="form-control">
              <label for="">Nha Cung cap</label>
              <input type="text" class="form-control" name="txtNCC" id="txtNCC" placeholder="Nha cung cap"
                aria-label="default input example">
            </div>
            <button type="submit" name="btnThem" value="btnThem" class="btn btn-primary">Them</button>
            <button type="submit" name="btnHienThi" value="btnHienThi" class="btn btn-primary">Hien Thi</button>
            <button type="submit" name="btnUpdate" value="btnUpdate" class="btn btn-primary">Update</button>
          </form>

        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Hien thi san pham</h5>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">MaSP</th>
                <th scope="col">TenSP</th>
                <th scope="col">DVT/th>
                <th scope="col">DonGi</th>
                <th scope="col">NCC</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(isset($_POST['btnHienThi'])){
                  $result=hienThiSanPham();
                  while($row=$result->fetch_assoc()) {
                      echo '<tr>';
                      echo '<td>'.$row['MaSP'].'</td>';
                      echo '<td>'.$row['TenSP'].'</td>';
                      echo '<td>'.$row['DVT'].'</td>';
                      echo '<td>'.$row['DonGia'].'</td>';
                      echo '<td>'.$row['NCC'].'</td>';
                      echo '</tr>';
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php
    if(isset($_POST['btnThem'])){
      $MaSP=$_POST['txtMaSP'];
      $TenSP=$_POST['txtTenSP'];
      $DVT=$_POST['txtDVT'];
      $DonGia=$_POST['txtDonGia'];
      $NCC=$_POST['txtNCC'];
      $i=themSanPhamDB($MaSP, $TenSP, $DVT, $DonGia, $NCC);
      if ($i < 0) {
        echo "Them thanh cong";
      }
      else {
        echo "Them that bai";
      }
    }
  ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>