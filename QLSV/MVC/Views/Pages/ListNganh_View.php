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
    <form action="http://localhost/QLSV/NganhThem_Controller">
        <div style="font-size: 20px; font-weight: bold; margin-bottom: 10px; text-align: right;">
            <a href=""><input class="btn btn-outline-info" type="submit" name="btnTaoMoi" value="Tạo mới" style="width: 85px; font-weight: bold"></a>
        </div>
    </form>
    <form class="formtk" method="post" action="http://localhost/QLSV/NganhList_Controller/timkiem">
        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Tìm kiếm ngành</span>
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
        </div>

        <div style="text-align: center; margin: 10px;">
            <button type="submit" class="btn btn-outline-info" name="btnSearch">Tìm kiếm</button>
        </div>
    </form>

    <form class="formdskm" method="post" action="">
        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Danh sách ngành</span>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>STT</th>
                    <th>Mã ngành</th>
                    <th>Tên ngành</th>
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
                            <?php echo $row['maNganh'] ?>
                        </td>
                        <td>
                            <?php echo $row['tenNganh'] ?>
                        </td>
                        <td>
                            <?php echo $row['maKhoa']?>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn sửa không?')" href="http://localhost/QLSV/NganhList_Controller/sua/<?php echo $row['maNganh'] ?>">
                                <i class="fas fa-edit fa-lg" style="color: black;"></i>
                            </a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="http://localhost/QLSV/NganhList_Controller/xoa/<?php echo $row['maNganh'] ?>">
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