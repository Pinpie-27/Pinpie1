<?php

class hocphan extends connectDB{
    //Thêm
    function hocphan_ins($mhp, $tenhp, $kh, $dhp, $msv, $mgv, $mn, $mk)
    {
        $sql = "INSERT INTO hocphan VALUES ('$mhp', '$tenhp', '$kh', '$dhp', '$msv', '$mgv', '$mn', '$mk')";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra trùng id
    function checksameid($mhp){
        $sql = "SELECT * FROM hocphan WHERE maHP = '$mhp'";
        $dt = mysqli_query($this->con, $sql);
        $kq = false; //Không trùng mã loại
        if(mysqli_num_rows($dt) > 0){
            $kq = true;
        }
        return $kq; //Trùng mã loại
    }

    //Danh sách và tìm kiếm
    function hocphan_find($mhp, $tenhp){
        $sql = "SELECT * FROM hocphan WHERE maHP like '%$mhp%' AND tenHP like '%$tenhp%'";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra khóa ngoại
    // function checkForeignKey($mncc){
    //     $sql = "SELECT * FROM qlsanpham WHERE maNCC = '$mncc'";
    //     $result = mysqli_query($this->con, $sql);
    //     return mysqli_num_rows($result) > 0;
    // }

    //Xóa
    function hocphan_del($mhp){
        $sql = "DELETE FROM hocphan WHERE maHP = '$mhp'";
        return mysqli_query($this->con, $sql);
    }

    //Sửa
    function hocphan_sel_upd($mhp){
        $sql = "SELECT * FROM hocphan WHERE maHP = '$mhp'";
        return mysqli_query($this->con, $sql);
    }

    function hocphan_upd($mhp, $tenhp, $kh, $dhp, $msv, $mgv, $mn, $mk){
        $sql = "UPDATE hocphan SET tenHP ='$tenhp', kiHoc ='$kh', diemHP ='$dhp', maSV ='$msv', maGV = '$mgv', maNganh = '$mn', maKhoa = '$mk' WHERE maHP = '$mhp'";
        return mysqli_query($this->con, $sql);
    }
}

?>