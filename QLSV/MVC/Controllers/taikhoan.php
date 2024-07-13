<?php

class taikhoan extends controller
{
    protected $dn;

    function __construct()
    {
        $this->dn = $this->model('taikhoan_Model');
    }

    function Get_data()
    {
        $this->view('taikhoan_v', [
            'page' => 'dangnhap_tk',
        ]);
    }

    function dangnhap()
    {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $_SESSION['username'] = $username;
            $password = $_POST['password'];
            $role = $username == "admin" ? 1 : 0;

            $result = $this->dn->dangnhap($username, $password, $role);


            if ($role == 1) {
                if (mysqli_num_rows($result)) {
                    echo "<script> alert('Đăng nhập tài khoản admin thành công') </script>";
                    echo "<script>window.location.href= 'http://localhost/QLSV/giaodien_admin' </script>";
                    $this->view(
                        'MasterLayout',
                        [
                            'page' => 'Pages/giaodien_admin',
                            'taikhoan' => $username,
                        ]
                    );
                } else {
                    echo "<script> alert('Đăng nhập thất bại') </script>";
                    echo "<script>window.location.href= 'http://localhost/QLSV/taikhoan' </script>";
                }
            } else {
                //Đăng nhập của user -> trả về giaodien_user
            }
        } else {
            header("location: http://localhost/QLSV/taikhoan_tk");
            exit;
        }
    }


}
