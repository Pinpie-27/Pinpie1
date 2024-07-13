<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    .form-row {
        margin: 10px;
    }

    .formdskm {
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
</style>
</head>

<body>
    <form action="http://localhost/QLSV/GiangVienThem_Controller">
        <div style="font-size: 20px; font-weight: bold; margin-bottom: 10px; text-align: right;">
            <a href=""><input class="btn btn-outline-info" type="submit" name="btnTaoMoi" value="Tạo mới" style="width: 85px; font-weight: bold"></a>
        </div>
    </form>
    <form class="formtk" method="post" action="http://localhost/QLSV/GiangVienList_Controller/timkiem">
        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Tìm kiếm giảng viên</span>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtMaGV">Mã giảng viên</label>
                <input type="text" class="form-control" name="txtMaGV" placeholder="Mã giảng viên" value="<?php if (isset($data['mgv'])) echo $data['mgv'] ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="txtTenGV">Tên giảng viên</label>
                <input type="text" class="form-control" name="txtTenGV" placeholder="Tên giảng viên" value="<?php if (isset($data['tengv'])) echo $data['tengv'] ?>">
            </div>
        </div>

        <div style="text-align: center; margin: 10px;">
            <button type="submit" class="btn btn-outline-info" name="btnSearch">Tìm kiếm</button>
        </div>
    </form>

    <form class="formdskm" method="post" action="">
        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Danh sách giảng viên</span>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>STT</th>
                    <th>Mã giảng viên</th>
                    <th>Tên giảng viên</th>
                    <th>Số điện thoại</th>
                    <th>Ngày sinh</th>
                    <th>Email</th>
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
                            <?php echo $row['maGV'] ?>
                        </td>
                        <td>
                            <?php echo $row['tenGV'] ?>
                        </td>
                        <td>
                            <?php echo $row['sdt'] ?>
                        </td>
                        <td>
                            <?php echo $row['ngaySinh'] ?>
                        </td>
                        <td>
                            <?php echo $row['email'] ?>
                        </td>
                        <td>
                            <?php echo $row['maKhoa'] ?>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn sửa không?')" href="http://localhost/QLSV/GiangVienList_Controller/sua/<?php echo $row['maGV'] ?>">
                                <i class="fas fa-edit fa-lg" style="color: black;"></i>
                            </a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="http://localhost/QLSV/GiangVienList_Controller/xoa/<?php echo $row['maGV'] ?>">
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
</body>

</html>