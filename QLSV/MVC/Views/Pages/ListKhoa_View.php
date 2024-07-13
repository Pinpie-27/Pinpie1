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
    <form action="http://localhost/QLSV/KhoaThem_Controller">
        <div style="font-size: 20px; font-weight: bold; margin-bottom: 10px; text-align: right;">
            <a href=""><input class="btn btn-outline-info" type="submit" name="btnTaoMoi" value="Tạo mới" style="width: 85px; font-weight: bold"></a>
        </div>
    </form>
    <form class="formtk" method="post" action="http://localhost/QLSV/KhoaList_Controller/timkiem">
        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Tìm kiếm khoa</span>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtMaKhoa">Mã khoa</label>
                <input type="text" class="form-control" name="txtMaKhoa" placeholder="Mã khoa" value="<?php if (isset($data['mk'])) echo $data['mk'] ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="txtTenKhoa">Tên khoa</label>
                <input type="text" class="form-control" name="txtTenKhoa" placeholder="Tên khoa" value="<?php if (isset($data['tenk'])) echo $data['tenk'] ?>">
            </div>
        </div>

        <div style="text-align: center; margin: 10px;">
            <button type="submit" class="btn btn-outline-info" name="btnSearch">Tìm kiếm</button>
        </div>
    </form>

    <form class="formdskm" method="post" action="">
        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Danh sách khoa</span>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>STT</th>
                    <th>Mã khoa</th>
                    <th>Tên khoa</th>
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
                            <?php echo $row['maKhoa'] ?>
                        </td>
                        <td>
                            <?php echo $row['tenKhoa'] ?>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn sửa không?')" href="http://localhost/QLSV/KhoaList_Controller/sua/<?php echo $row['maKhoa'] ?>">
                                <i class="fas fa-edit fa-lg" style="color: black;"></i>
                            </a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="http://localhost/QLSV/KhoaList_Controller/xoa/<?php echo $row['maKhoa'] ?>">
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