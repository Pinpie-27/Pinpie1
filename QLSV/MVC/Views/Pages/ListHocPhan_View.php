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
    <form action="http://localhost/QLSV/HocPhanThem_Controller">
        <div style="font-size: 20px; font-weight: bold; margin-bottom: 10px; text-align: right;">
            <a href=""><input class="btn btn-outline-info" type="submit" name="btnTaoMoi" value="Tạo mới" style="width: 85px; font-weight: bold"></a>
        </div>
    </form>
    <form class="formtk" method="post" action="http://localhost/QLSV/HocPhanList_Controller/timkiem">
        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Tìm kiếm học phần</span>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtMaHP">Mã học phần</label>
                <input type="text" class="form-control" name="txtMaHP" placeholder="Mã học phần" value="<?php if (isset($data['mhp'])) echo $data['mhp'] ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="txtTenHP">Tên học phần</label>
                <input type="text" class="form-control" name="txtTenHP" placeholder="Tên học phần" value="<?php if (isset($data['tenhp'])) echo $data['tenhp'] ?>">
            </div>
        </div>

        <div style="text-align: center; margin: 10px;">
            <button type="submit" class="btn btn-outline-info" name="btnSearch">Tìm kiếm</button>
        </div>
    </form>

    <form class="formdskm" method="post" action="">
        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Danh sách học phần</span>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>STT</th>
                    <th>Mã học phần</th>
                    <th>Tên học phần</th>
                    <th>Kỳ học</th>
                    <th>Điểm học phần</th>
                    <th>Mã sinh viên</th>
                    <th>Mã giáo viên</th>
                    <th>Mã ngành</th>
                    <th>Mã khoa</th>
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
                            <?php echo $row['maHP'] ?>
                        </td>
                        <td>
                            <?php echo $row['tenHP'] ?>
                        </td>
                        <td>
                            <?php echo $row['kiHoc'] ?>
                        </td>
                        <td>
                            <?php echo $row['maSV'] ?>
                        </td>
                        <td>
                            <?php echo $row['maGV'] ?>
                        </td>
                        <td>
                            <?php echo $row['maNganh'] ?>
                        </td>
                        <td>
                            <?php echo $row['maKhoa'] ?>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn sửa không?')" href="http://localhost/QLSV/HocPhanList_Controller/sua/<?php echo $row['maHP'] ?>">
                                <i class="fas fa-edit fa-lg" style="color: black;"></i>
                            </a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="http://localhost/QLSV/HocPhanList_Controller/xoa/<?php echo $row['maHP'] ?>">
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