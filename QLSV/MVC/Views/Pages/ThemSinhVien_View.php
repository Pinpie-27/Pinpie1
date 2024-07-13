<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .Them_SP {
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
    <form class="Them_SP" method="post" action="http://localhost/QLSV/SinhVienThem_ConTroller/themmoi" enctype="multipart/form-data">

        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Cập nhật sinh viên</span>
        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="txtMaSV">Mã sinh viên</label>
                <input type="text" name="txtMaSV" class="form-control" placeholder="Mã sinh viên" value="<?php if (isset($data['msv'])) echo $data['msv'] ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="txtTenSV">Tên sinh viên</label>
                <input type="text" name="txtTenSV" class="form-control" placeholder="Tên sinh viên" value="<?php if (isset($data['tensv'])) echo $data['tensv'] ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="txtNS">Ngày sinh</label>
                <input type="date" name="txtNS" class="form-control" placeholder="Ngày sinh" value="<?php if (isset($data['ns'])) echo $data['ns'] ?>">
            </div>
        </div>



        <div class="form-row">
            <div class="img-preview">
                <img id="imgPreview" style="width:50%; height: auto;" src="https://shopimg.posapp.vn/defaults/image.png" class="img-error">
            </div>

            <div class="form-group col-md-6">
                <label for="txtAnh">Ảnh</label>
                <input type="file" name="txtAnh" accept="image/*" class="form-control" placeholder="Hình ảnh" onchange="previewImage(this)" value="<?php if (isset($data['anh'])) echo $data['anh'] ?>">


            </div>
            <div class="form-group col-md-6">
                <label for="txtEmail">Email</label>
                <input type="email" name="txtEmail" class="form-control" placeholder="Email" value="<?php if (isset($data['email'])) echo $data['email'] ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="txtDiaChi">Địa chỉ</label>
                <input type="text" name="txtDiaChi" class="form-control" placeholder="Địa chỉ" value="<?php if (isset($data['dc'])) echo $data['dc'] ?>">
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtMaLop">Mã lớp</label>
                <select class="form-control" name="txtMaLop">

                    <option disabled selected>Chọn mã lớp</option>
                    <!-- <option>NV01</option> -->

                    <?php
                    $db_connection = mysqli_connect("localhost", "root", "", "quanlysinhvien");

                    if (!$db_connection) {
                        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                    }

                    $query = "SELECT maLop FROM lop";

                    $result = mysqli_query($db_connection, $query);

                    if ($result) {
                        // Lặp qua kết quả và tạo tùy chọn cho mỗi giá trị maNCC
                        while ($row = mysqli_fetch_assoc($result)) {
                            $ml = $row['maLop'];
                            echo "<option value='$ml'>$ml</option>";
                        }
                    } else {
                        echo "<script> alert('Not OK'); </script>";
                    }

                    mysqli_close($db_connection);
                    ?>
                </select>
            </div>

            <div class=" form-group col-md-6">
                <label for="txtMaNganh">Mã ngành</label>
                <select class="form-control" name="txtMaNganh">

                    <option disabled selected>Chọn mã ngành</option>
                    <!-- <option>NV01</option> -->

                    <?php
                    $db_connection = mysqli_connect("localhost", "root", "", "quanlysinhvien");

                    if (!$db_connection) {
                        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                    }

                    $query = "SELECT maNganh FROM nganh";

                    $result = mysqli_query($db_connection, $query);

                    if ($result) {
                        // Lặp qua kết quả và tạo tùy chọn cho mỗi giá trị maNCC
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

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtMaKhoa">Mã khoa</label>
                <select class="form-control" name="txtMaKhoa">

                    <option disabled selected>Chọn mã khoa</option>
                    <!-- <option>NV01</option> -->

                    <?php
                    $db_connection = mysqli_connect("localhost", "root", "", "quanlysinhvien");

                    if (!$db_connection) {
                        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                    }

                    $query = "SELECT maKhoa FROM khoa";

                    $result = mysqli_query($db_connection, $query);

                    if ($result) {
                        // Lặp qua kết quả và tạo tùy chọn cho mỗi giá trị maNCC
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

            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtIDTK">ID</label>
                <select class="form-control" name="txtIDTK">

                    <option disabled selected>Chọn id</option>
                    <!-- <option>NV01</option> -->

                    <?php
                    $db_connection = mysqli_connect("localhost", "root", "", "quanlysinhvien");

                    if (!$db_connection) {
                        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                    }

                    $query = "SELECT id FROM taikhoan";

                    $result = mysqli_query($db_connection, $query);

                    if ($result) {
                        // Lặp qua kết quả và tạo tùy chọn cho mỗi giá trị maNCC
                        while ($row = mysqli_fetch_assoc($result)) {
                            $idtk = $row['id'];
                            echo "<option value='$idtk'>$idtk</option>";
                        }
                    } else {
                        echo "<script> alert('Not OK'); </script>";
                    }

                    mysqli_close($db_connection);
                    ?>
                </select>
            </div>


        </div>

        <div style="text-align: center; margin: 10px;">
            <button type="submit" class="btn btn-outline-info" name="btnLuu">Tạo mới</button>
        </div>
    </form>

    <script>
        function previewImage(input) {
            var imagePreview = document.getElementById('imgPreview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.style.display = 'block';
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>

</html>