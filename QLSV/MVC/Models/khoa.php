<?php

class khoa extends connectDB{
    //Thêm
    function khoa_ins($mk, $tenk)
    {
        $sql = "INSERT INTO khoa VALUES ('$mk', '$tenk')";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra trùng id
    function checksameid($mk){
        $sql = "SELECT * FROM khoa WHERE maKhoa = '$mk'";
        $dt = mysqli_query($this->con, $sql);
        $kq = false; //Không trùng mã loại
        if(mysqli_num_rows($dt) > 0){
            $kq = true;
        }
        return $kq; //Trùng mã loại
    }

    //Danh sách và tìm kiếm
    function khoa_find($mk, $tenk){
        $sql = "SELECT * FROM khoa WHERE maKhoa like '%$mk%' AND tenKhoa like '%$tenk%'";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra khóa ngoại
    function checkForeignKey1($mk){
        $sql = "SELECT * FROM giangvien WHERE maKhoa = '$mk'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_num_rows($result) > 0;
    }

    function checkForeignKey($mk){
        $sql = "SELECT * FROM nganh WHERE maKhoa = '$mk'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_num_rows($result) > 0;
    }

    //Xóa
    function khoa_del($mk){
        $sql = "DELETE FROM khoa WHERE maKhoa = '$mk'";
        return mysqli_query($this->con, $sql);
    }

    //Sửa
    function khoa_sel_upd($mk){
        $sql = "SELECT * FROM khoa WHERE maKhoa = '$mk'";
        return mysqli_query($this->con, $sql);
    }

    function khoa_upd($mk, $tenk){
        $sql = "UPDATE khoa SET tenKhoa ='$tenk' WHERE maKhoa = '$mk'";
        return mysqli_query($this->con, $sql);
    }
}

?>