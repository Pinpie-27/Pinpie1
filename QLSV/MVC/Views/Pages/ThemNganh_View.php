<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    .Them_KM {
      margin-left: 270px;
      border: 1px solid #17a2b8;
      margin-right: 10px;
      margin-top: 50px;
    }

    .tieude {
      background-color: #17a2b8;
      height: 45px;
      padding: 7.5px 0px;
    }

    .form-row {
      margin: 10px;
    }
  </style>
</head>

<body>
  <form class="Them_KM" method="post" action="http://localhost/QLSV/NganhThem_Controller/themmoi">

    <div class="tieude">
      <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Cập nhật ngành</span>
    </div>
    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="txtMaNganh">Mã ngành</label>
        <input type="text" class="form-control" name="txtMaNganh" placeholder="Mã ngành" value="<?php if (isset($data['mn'])) echo $data['mn'] ?>">
      </div>

      <div class="form-group col-md-6">
        <label for="txtTenNganh">Tên ngành</label>
        <input type="text" class="form-control" name="txtTenNganh" placeholder="Tên ngành" value="<?php if (isset($data['tenn'])) echo $data['tenn'] ?>">
      </div>
  
      <div class="form-group col-md-6">
        <label for="txtMaKhoa">Mã khoa</label>
        <select class="form-control" name="txtMaKhoa">

          <option disabled selected>Chọn mã khoa</option>
          <?php
          $db_connection = mysqli_connect("localhost", "root", "", "quanlysinhvien");

          if (!$db_connection) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
          }

          $query = "SELECT maKhoa FROM khoa";

          $result = mysqli_query($db_connection, $query);

          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $mk = $row['maKhoa'];
              echo "<option value='$mk'>$mk</option>";
            }
          } else {
            echo "<script> alert('Not OK'); </script>";
          }

          mysqli_close($db_connection);
          ?>
        </select>
    </div>

    <div style="text-align: center; margin: 10px;">
      <button type="submit" class="btn btn-outline-info" name="btnLuu">Tạo mới</button>
    </div>
  </form>
</body>

</html>