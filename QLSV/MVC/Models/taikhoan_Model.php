<?php
class taikhoan_Model extends connectDB
{


    function dangnhap($username, $password, $role)
    {
        $query = "SELECT * FROM `taikhoan` WHERE `tenDN` = '$username' AND `matKhau` = '$password' AND `role` = '$role'";
        return mysqli_query($this->con, $query);
    }

}
