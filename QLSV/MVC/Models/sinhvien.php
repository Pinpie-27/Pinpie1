<?php

class sinhvien extends connectDB{
    //Thêm
    function sinhvien_ins($msv, $anh, $tensv, $ns, $email, $dc, $ml, $mn, $mk, $idtk)
    {
        $sql = "INSERT INTO sinhvien VALUES ('$msv', '$anh', '$tensv', '$ns', '$email', '$dc', '$ml', '$mn', '$mk', '$idtk')";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra trùng id
    function checksameid($msv){
        $sql = "SELECT * FROM sinhvien WHERE masv = '$msv'";
        $dt = mysqli_query($this->con, $sql);
        $kq = false; //Không trùng mã loại
        if(mysqli_num_rows($dt) > 0){
            $kq = true;
        }
        return $kq; //Trùng mã loại
    }

    //Danh sách và tìm kiếm
    function sinhvien_find($msv, $tensv){
        $sql = "SELECT * FROM sinhvien WHERE masv like '%$msv%' AND tenSV like '%$tensv%'";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra khóa ngoại
    // function checkForeignKey($mncc){
    //     $sql = "SELECT * FROM qlsanpham WHERE maNCC = '$mncc'";
    //     $result = mysqli_query($this->con, $sql);
    //     return mysqli_num_rows($result) > 0;
    // }

    //Xóa
    // function sinhvien_del($msv){
    //     // $sql = "DELETE FROM sinhvien WHERE maSV = '$msv'";
    //     // return mysqli_query($this->con, $sql);

    //     $path = __DIR__ . '/uploads/';

    //     $sql = "SELECT * FROM sinhvien WHERE masv = '$msv' LIMIT 1";
    //     $dt = mysqli_query($this->con, $sql);

    //     while ($row = mysqli_fetch_array($dt)) {
    //         unlink($path . $row['anh']);
    //     }

    //      $sql = "DELETE FROM sinhvien WHERE masv = '$msv'";
    //     return mysqli_query($this->con, $sql);
    // }

    function sinhvien_del($msv){
        $path = __DIR__ . '/uploads/';
    
        $sql = "SELECT * FROM sinhvien WHERE masv = '$msv' LIMIT 1";
        $dt = mysqli_query($this->con, $sql);
    
        // while ($row = mysqli_fetch_array($dt)) {
        //     $file_path = $path . $row['anh'];
        //     // Kiểm tra xem tập tin có tồn tại không
        //     if (file_exists($file_path)) {
        //         @unlink($file_path); // Xóa tập tin nếu tồn tại
        //     }
        //     else {
        //         echo "Tập tin không tồn tại: $file_path";
        //     }
        // }

        while ($row = mysqli_fetch_array($dt)) {
            $file_path = $path . $row['anh'];
            // Sử dụng @unlink để ngăn thông báo lỗi hiển thị
            @unlink($file_path);
        }
    
        $sql = "DELETE FROM sinhvien WHERE masv = '$msv'";
        return mysqli_query($this->con, $sql);
    }
    

    //Sửa
    function sinhvien_sel_upd($msv){
        $sql = "SELECT * FROM sinhvien WHERE masv = '$msv'";
        return mysqli_query($this->con, $sql);
    }

    function sinhvien_upd($msv, $anh, $tensv, $ns, $email, $dc, $ml, $mn, $mk){
        $sql = "UPDATE sinhvien SET anh ='$anh', tenSV ='$tensv', ngaySinh ='$ns', email ='$email', diaChi = '$dc', maLop = '$ml', maNganh = '$mn', maKhoa = '$mk' WHERE masv = '$msv'";
        return mysqli_query($this->con, $sql);
    }
}

?>