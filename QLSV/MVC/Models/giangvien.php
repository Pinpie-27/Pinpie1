<?php

class giangvien extends connectDB{
    //Thêm
    function giangvien_ins($mgv, $tengv, $sdt, $ns, $email, $mk)
    {
        $sql = "INSERT INTO giangvien VALUES ('$mgv', '$tengv', '$sdt', '$ns', '$email', '$mk')";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra trùng id
    function checksameid($mgv){
        $sql = "SELECT * FROM giangvien WHERE maGV = '$mgv'";
        $dt = mysqli_query($this->con, $sql);
        $kq = false; //Không trùng mã loại
        if(mysqli_num_rows($dt) > 0){
            $kq = true;
        }
        return $kq; //Trùng mã loại
    }

    //Danh sách và tìm kiếm
    function giangvien_find($mgv, $tengv){
        $sql = "SELECT * FROM giangvien WHERE maGV like '%$mgv%' AND tenGV like '%$tengv%'";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra khóa ngoại
    // function checkForeignKey($mncc){
    //     $sql = "SELECT * FROM qlsanpham WHERE maNCC = '$mncc'";
    //     $result = mysqli_query($this->con, $sql);
    //     return mysqli_num_rows($result) > 0;
    // }

    //Xóa
    function giangvien_del($mgv){
        $sql = "DELETE FROM giangvien WHERE maGV = '$mgv'";
        return mysqli_query($this->con, $sql);
    }

    //Sửa
    function giangvien_sel_upd($mgv){
        $sql = "SELECT * FROM giangvien WHERE maGV = '$mgv'";
        return mysqli_query($this->con, $sql);
    }

    function giangvien_upd($mgv, $tengv, $sdt, $ns, $email, $mk){
        $sql = "UPDATE giangvien SET tenGV ='$tengv', sdt ='$sdt', ngaySinh ='$ns', email ='$email', maKHoa = '$mk' WHERE maGV = '$mgv'";
        return mysqli_query($this->con, $sql);
    }
}

?>