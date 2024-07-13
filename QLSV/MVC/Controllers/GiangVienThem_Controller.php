<?php

class GiangVienThem_Controller extends controller{
    protected $gv;

    function __construct(){
        $this->gv=$this->model('giangvien');
    }

    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'ThemGiangVien_View',
            'mgv'=>'',
            'tengv'=>'',
            'sdt'=>'',
            'ns'=>'',
            'email'=>'',
            'mk'=>''
        ]);
    }

    function themmoi(){
        if(isset($_POST['btnLuu'])){
            //Lấy dữ liệu trên các control của form
            $mgv = $_POST['txtMaGV'];
            $tengv = $_POST['txtTenGV'];
            $sdt = $_POST['txtSDT'];
            $ns = $_POST['txtNS'];
            $email = $_POST['txtEmail'];
            $mk = $_POST['txtMaKhoa'];

            //Kiểm tra nhập đầy đủ thông tin
            if($mgv == '' || $tengv == '' || $sdt == '' || $ns == '' || $email == '' || $mk == ''){
                echo "<script> alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            }
            
            //Kiểm tra trùng id
           else{
            $chkid = $this->gv->checksameid($mgv);
            if($chkid){
                echo "<script> alert('Trùng mã giảng viên!')</script>";
            }
            else{
                $kq = $this->gv->giangvien_ins($mgv, $tengv, $sdt, $ns, $email, $mk);

                if($kq){
                    echo "<script> alert('Thêm mới thành công'); </script>"; 
                    echo "<script> window.location.href= ' http://localhost/QLSV/GiangVienList_Controller'</script>";              
                }

                else{
                    echo "<script> alert('Thêm mới thất bại'); </script>";
                }

            }
           }
        }

        $this->view('MasterLayout', [
            'page'=>'ThemGiangVien_View',
            'mgv'=>$mgv,
            'tengv'=>$tengv,
            'sdt'=>$sdt,
            'ns'=>$ns,
            'email'=>$email,
            'mk'=>$mk
        ]);


    }
}
