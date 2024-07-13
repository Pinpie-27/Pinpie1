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
  <form class="Them_KM" method="post" action="http://localhost/QLSV/LopThem_Controller/themmoi">

    <div class="tieude">
      <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Cập nhật lớp</span>
    </div>
    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="txtMaLop">Mã lớp</label>
        <input type="text" class="form-control" name="txtMaLop" placeholder="Mã lớp" value = "<?php if(isset($data['ml'])) echo $data['ml'] ?>">
      </div>

      <div class="form-group col-md-6">
        <label for="txtTenLop">Tên lớp</label>
        <input type="text" class="form-control" name="txtTenLop" placeholder="Tên lớp" value = "<?php if(isset($data['tenl'])) echo $data['tenl'] ?>">
      </div>

    </div>

    <div style="text-align: center; margin: 10px;">
      <button type="submit" class="btn btn-outline-info" name="btnLuu">Tạo mới</button>
    </div>
  </form>
</body>

</html>