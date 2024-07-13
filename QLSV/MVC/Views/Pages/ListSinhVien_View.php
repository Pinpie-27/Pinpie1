<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    .formdssp {
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

    .formtk {
        margin-left: 270px;
        border: 1px solid #17a2b8;
        margin-right: 10px;
        margin-top: 50px;
    }

    .form-row {
        margin: 10px;
    }
</style>
</head>

<body>
    <form action="http://localhost/QLSV/SinhVienThem_Controller">
        <div style="font-size: 20px; font-weight: bold; margin-bottom: 10px; text-align: right;">
            <a href=""><input class="btn btn-outline-info" type="submit" name="btnTaoMoi" value="Tạo mới" style="width: 85px; font-weight: bold"></a>
        </div>
    </form>

    <form class="formtk" method="post" action="http://localhost/QLSV/SinhVienThem_Controller/timkiem">
        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Tìm kiếm sinh viên</span>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtMaSV">Mã sinh viên</label>
                <input type="text" class="form-control" name="txtMaSV" placeholder="Mã sinh viên" value="<?php if (isset($data['msv'])) echo $data['msv'] ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="txtTenSV">Tên sinh viên</label>
                <input type="text" class="form-control" name="txtTenSV" placeholder="Tên sinh viên" value="<?php if (isset($data['tensv'])) echo $data['tensv'] ?>">
            </div>
        </div>

        <div style="text-align: center; margin: 10px;">
            <button type="submit" class="btn btn-outline-info" name="btnSearch">Tìm kiếm</button>
        </div>
    </form>

    <form class="formdssp" method="post" action="">
        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Danh sách sinh viên</span>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>STT</th>
                    <th>Mã sinh viên</th>
                    <th>Hình ảnh</th>
                    <th>Tên sinh viên</th>
                    <th>Ngày sinh</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Mã lớp</th>
                    <th>Mã ngành</th>
                    <th>Mã khoa</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <?php
            if (isset($data['dulieu']) && $data['dulieu'] != null) {
                $i = 0;
                while ($row = mysqli_fetch_assoc($data['dulieu'])) {

            ?>

                    <tr>
                        <td>
                            <?php echo ++$i ?>
                        </td>
                        <td>
                            <?php echo $row['masv'] ?>
                        </td>
                        <td>
                            <img src="http://localhost/QLSV/MVC/Controllers/uploads/<?php echo $row['anh'] ?>" width="150px">
                        </td>
                        <td>
                            <?php echo $row['tenSV'] ?>
                        </td>
                        <td>
                            <?php echo $row['ngaySinh'] ?>
                        </td>
                        <td>
                            <?php echo $row['email'] ?>
                        </td>
                        <td>
                            <?php echo $row['diaChi'] ?>
                        </td>
                        <td>
                            <?php echo $row['maLop'] ?>
                        </td>

                        <td>
                            <?php echo $row['maNganh'] ?>
                        </td>

                        <td>
                            <?php echo $row['maKhoa'] ?>
                            <!-- <?php if (isset($row['tenNSP'])) echo $row['tenNSP']; ?> -->
                        </td>
                        
                        

                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn sửa không?')" href="http://localhost/QLSV/SinhVienList_Controller/sua/<?php echo $row['masv'] ?>">
                                <i class="fas fa-edit fa-lg" style="color: black;"></i>
                            </a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="http://localhost/QLSV/SinhVienList_Controller/xoa/<?php echo $row['masv'] ?>">
                                <i class="fas fa-archive fa-lg" style="color: black;"></i>
                            </a>
                        </td>
                    </tr>
            <?php
                }
            }

            ?>
        </table>
    </form>

    <form action="http://localhost/BHST/MVC/Views/Pages/SanPhamMoi.php">
        <div style="font-size: 20px; font-weight: bold; margin-bottom: 10px; text-align: right; margin-top: 10px; margin-right: 20px;">
            <a href=""><input class="btn btn-outline-info" type="submit" name="btnTaoMoi" value="Mua Hàng" style="width: 100px; font-weight: bold"></a>
        </div>
    </form>
</body>

</html>