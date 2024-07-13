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


    <form class="Them_KM" method="post" action="http://localhost/QLSV/GiangVienList_Controller/suadl">

        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Sửa giảng viên</span>
        </div>
        <div class="form-row">

            <?php
            if (isset($data['dulieu']) && $data['dulieu']) {
                while ($row = mysqli_fetch_array($data['dulieu'])) {
            ?>
                    <div class="row g-3">
                        <div class="form-group col-md-6">
                            <label for="txtMaGV">Mã giảng viên</label>
                            <input type="text" class="form-control" name="txtMaGV" placeholder="Mã giảng viên" value="<?php echo $row['maGV']; ?>" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtTenGV">Tên giảng viên</label>
                            <input type="text" class="form-control" name="txtTenGV" placeholder="Tên giảng viên" value="<?php echo $row['tenGV'] ?>">
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="form-group col-md-6">
                            <label for="txtSDT">Số điện thoại</label>
                            <input type="text" class="form-control" name="txtSDT" placeholder="Số điện thoại" value="<?php echo $row['sdt']; ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtNS">Ngày sinh</label>
                            <input type="date" class="form-control" name="txtNS" placeholder="Ngày sinh" value="<?php echo $row['ngaySinh'] ?>">
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="form-group col-md-6">
                            <label for="txtEmail">Email</label>
                            <input type="email" class="form-control" name="txtEmail" placeholder="Email" value="<?php echo $row['email']; ?>">
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
                                    // Lặp qua kết quả và tạo tùy chọn cho mỗi giá trị maNCC
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $mk = $row['maKhoa'];
                                        echo "<option value='$mk'>$mk</option>";
                                    }
                                    echo "<option selected value='$mk'>$mk</option>";
                                } else {
                                    echo "<script> alert('Not OK'); </script>";
                                }
                                mysqli_close($db_connection);
                                ?>
                            </select>
                        </div>
                    </div>

        </div>
<?php
                }
            }

?>

<div style="text-align: center; margin: 10px;">
    <button type="submit" class="btn btn-outline-info" name="btnHuy">Hủy</button> &nbsp;&nbsp;&nbsp;
    <button type="submit" class="btn btn-outline-info" name="btnSua">Sửa</button>
</div>

    </form>
</body>

</html>