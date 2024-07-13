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
    <form class="Them_KM" method="post" action="http://localhost/QLSV/HocPhanThem_Controller/themmoi">

        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Cập nhật học phần</span>
        </div>
        <div class="form-row">
        <div class="row g-3">
            <div class="form-group col-md-6">
                <label for="txtMaHP">Mã học phần</label>
                <input type="text" class="form-control" name="txtMaHP" placeholder="Mã học phần" value="<?php if (isset($data['mhp'])) echo $data['mhp'] ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="txtTenHP">Tên ngành</label>
                <input type="text" class="form-control" name="txtTenHP" placeholder="Tên học phần" value="<?php if (isset($data['tenhp'])) echo $data['tenhp'] ?>">
            </div>
            </div>

            <div class="row g-3">
            <div class="form-group col-md-6">
                <label for="txtKiHoc">Kỳ học</label>
                <input type="text" class="form-control" name="txtKiHoc" placeholder="Kỳ học" value="<?php if (isset($data['kh'])) echo $data['kh'] ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="txtDiemHP">ĐIểm học phần</label>
                <input type="text" class="form-control" name="txtDiemHP" placeholder="Điểm học phần" value="<?php if (isset($data['diemhp'])) echo $data['diemhp'] ?>">
            </div>
            </div>

            <div class="row g-3">
            <div class="form-group col-md-6">
                <label for="txtMaSV">Mã sinh viên</label>
                <select class="form-control" name="txtMaSV">

                    <option disabled selected>Chọn mã sinh viên</option>
                    <?php
                    $db_connection = mysqli_connect("localhost", "root", "", "quanlysinhvien");

                    if (!$db_connection) {
                        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                    }

                    $query = "SELECT masv FROM sinhvien";

                    $result = mysqli_query($db_connection, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $msv = $row['masv'];
                            echo "<option value='$msv'>$msv</option>";
                        }
                    } else {
                        echo "<script> alert('Not OK'); </script>";
                    }

                    mysqli_close($db_connection);
                    ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="txtMaGV">Mã giảng viên</label>
                <select class="form-control" name="txtMaGV">

                    <option disabled selected>Chọn mã giảng viên</option>
                    <?php
                    $db_connection = mysqli_connect("localhost", "root", "", "quanlysinhvien");

                    if (!$db_connection) {
                        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                    }

                    $query = "SELECT maGV FROM giangvien";

                    $result = mysqli_query($db_connection, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $mgv = $row['maGV'];
                            echo "<option value='$mgv'>$mgv</option>";
                        }
                    } else {
                        echo "<script> alert('Not OK'); </script>";
                    }

                    mysqli_close($db_connection);
                    ?>
                </select>
            </div>
            </div>

            <div class="row g-3">
            <div class="form-group col-md-6">
                <label for="txtMaNganh">Mã ngành</label>
                <select class="form-control" name="txtMaNganh">

                    <option disabled selected>Chọn mã ngành</option>
                    <?php
                    $db_connection = mysqli_connect("localhost", "root", "", "quanlysinhvien");

                    if (!$db_connection) {
                        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                    }

                    $query = "SELECT maNganh FROM nganh";

                    $result = mysqli_query($db_connection, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $mn = $row['maNganh'];
                            echo "<option value='$mn'>$mn</option>";
                        }
                    } else {
                        echo "<script> alert('Not OK'); </script>";
                    }

                    mysqli_close($db_connection);
                    ?>
                </select>
            </div>
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