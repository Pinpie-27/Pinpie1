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


    <form class="Them_KM" method="post" action="http://localhost/QLSV/LopList_Controller/suadl">

        <div class="tieude">
            <span style="font-size: 20px; font-weight: bold; margin-left: 14px;">Sửa lớp</span>
        </div>
        <div class="form-row">

            <?php
            if (isset($data['dulieu']) && $data['dulieu']) {
                while ($row = mysqli_fetch_array($data['dulieu'])) {
            ?>

                    <div class="form-group col-md-6">
                        <label for="txtMaLop">Mã lớp</label>
                        <input type="text" class="form-control" name="txtMaLop" placeholder="Mã lớp" value="<?php echo $row['maLop']; ?>" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="txtTenLop">Tên lớp</label>
                        <input type="text" class="form-control" name="txtTenLop" placeholder="Tên lớp" value="<?php echo $row['tenLop'] ?>">
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