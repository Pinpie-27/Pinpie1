<?php

class lop extends connectDB{
    //Thêm
    function lop_ins($ml, $tenl)
    {
        $sql = "INSERT INTO lop VALUES ('$ml', '$tenl')";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra trùng id
    function checksameid($ml){
        $sql = "SELECT * FROM lop WHERE maLop = '$ml'";
        $dt = mysqli_query($this->con, $sql);
        $kq = false; //Không trùng mã loại
        if(mysqli_num_rows($dt) > 0){
            $kq = true;
        }
        return $kq; //Trùng mã loại
    }

    //Danh sách và tìm kiếm
    function lop_find($ml, $tenl){
        $sql = "SELECT * FROM lop WHERE maLop like '%$ml%' AND tenLop like '%$tenl%'";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra khóa ngoại
    // function checkForeignKey($mncc){
    //     $sql = "SELECT * FROM qlsanpham WHERE maNCC = '$mncc'";
    //     $result = mysqli_query($this->con, $sql);
    //     return mysqli_num_rows($result) > 0;
    // }

    //Xóa
    function lop_del($ml){
        $sql = "DELETE FROM lop WHERE maLop = '$ml'";
        return mysqli_query($this->con, $sql);
    }

    //Sửa
    function lop_sel_upd($ml){
        $sql = "SELECT * FROM lop WHERE maLop = '$ml'";
        return mysqli_query($this->con, $sql);
    }

    function lop_upd($ml, $tenl){
        $sql = "UPDATE lop SET tenLop ='$tenl' WHERE maLop = '$ml'";
        return mysqli_query($this->con, $sql);
    }
}

?>