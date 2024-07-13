<?php 
    class dangnhap extends controller {
        protected $dn;

        function __construct () {
            $this->dn = $this->model('taikhoan_Model');
        }

        function Get_data () {
            $this->view ('MasterLayout', [
                'page' => 'taikhoan/taikhoan_v',
                'data' => $this->dn->find('', ''),
                'role' => $this->dn->role()
            ]);
        }

        function find () {
            if (isset($_POST['btnSearch'])) {
                $tnd = $_POST['txtSearch'];
                $this->view ('MasterLayout', [
                    'page' => 'taikhoan/taikhoan',
                    'data' => $this->dn->find('', $tnd),
                    'username' => $tnd
                ]);
            }
        }

        function delete ($username) {
            $kq = $this->dn->delete($username);
            if($kq) {
                echo "<script>alert('Xóa thành công!')</script>";
            } else {
                echo "<script>alert('Xóa thất bại!')</script>";
            }
            echo "<script>window.location.href= 'http://localhost/QLSV/dangnhap/Get_data' </script>";
        }

        function insert () {
            if(isset($_POST['btnLuu'])) {
                $id = $_POST['txtID'];
                $username = $_POST['username'];
                $password = $_POST['txtPassword'];
                $role = $_POST['quyen'];
                // $checkId = $this->dn->checkId($username);
                // if($checkId->num_rows > 0) {
                //     echo "<script>alert('Tên tài khoản đã tồn tại!')</script>";
                // } else {
                //     $checkEmail = $this->dn->checkEmail($email);
                //     if($checkEmail->num_rows > 0) {
                //         echo "<script>alert('Email này đã được đăng ký tài khoản!')</script>";
                //     } else {
                //         $kq=$this->dn->insert ($tdn, $password, $email, $role);
                //         if($kq) {
                //             echo "<script>alert('Thêm tài khoản thành công!')</script>";
                //         } else {
                //             echo "<script>alert('Thêm tài khoản thất bại!')</script>";
                //         }
                //     }
                // }
                $this->view ('MasterLayout', [
                    'page' => 'taikhoan/taikhoan',
                    'data' => $this->dn->find ('', '')
                ]);
                echo "<script>window.location.href = 'http://localhost/QLSV/dangnhap/Get_data';</script>";
            }
        }
    }
?>