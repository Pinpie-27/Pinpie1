<?php

class nganh extends connectDB
{
    //Thêm
    function nganh_ins($mn, $tenn, $mk)
    {
        $sql = "INSERT INTO nganh VALUES ('$mn', '$tenn', '$mk')";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra trùng id
    function checksameid($mn)
    {
        $sql = "SELECT * FROM nganh WHERE maNganh = '$mn'";
        $dt = mysqli_query($this->con, $sql);
        $kq = false; //Không trùng mã loại
        if (mysqli_num_rows($dt) > 0) {
            $kq = true;
        }
        return $kq; //Trùng mã loại
    }

    //Danh sách và tìm kiếm
    function nganh_find($mn, $tenn)
    {
        $sql = "SELECT * FROM nganh WHERE maNganh like '%$mn%' AND tenNganh like '%$tenn%'";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra khóa ngoại
    // function checkForeignKey($mncc){
    //     $sql = "SELECT * FROM qlsanpham WHERE maNCC = '$mncc'";
    //     $result = mysqli_query($this->con, $sql);
    //     return mysqli_num_rows($result) > 0;
    // }

    //Xóa
    function nganh_del($mn)
    {
        $sql = "DELETE FROM nganh WHERE maNganh = '$mn'";
        return mysqli_query($this->con, $sql);
    }

    //Sửa
    function nganh_sel_upd($mn)
    {
        $sql = "SELECT * FROM nganh WHERE maNganh = '$mn'";
        return mysqli_query($this->con, $sql);
    }

    function nganh_upd($mn, $tenn, $mk)
    {
        $sql = "UPDATE nganh SET tenNganh ='$tenn', maKhoa = '$mk' WHERE maNganh = '$mn'";
        return mysqli_query($this->con, $sql);
    }
}
