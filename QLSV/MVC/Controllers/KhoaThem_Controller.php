<?php

class KhoaThem_Controller extends controller{
    protected $khoa;

    function __construct(){
        $this->khoa=$this->model('khoa');
    }

    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'ThemKhoa_View',
            'mk'=>'',
            'tenk'=>'',
        ]);
    }

    function themmoi(){
        if(isset($_POST['btnLuu'])){
            //Lấy dữ liệu trên các control của form
            $mk = $_POST['txtMaKhoa'];
            $tenk = $_POST['txtTenKhoa'];

            //Kiểm tra nhập đầy đủ thông tin
            if($mk == '' || $tenk == ''){
                echo "<script> alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            }
            
            //Kiểm tra trùng id
           else{
            $chkid = $this->khoa->checksameid($mk);
            if($chkid){
                echo "<script> alert('Trùng mã khoa!')</script>";
            }
            else{
                $kq = $this->khoa->khoa_ins($mk, $tenk);

                if($kq){
                    echo "<script> alert('Thêm mới thành công'); </script>"; 
                    echo "<script> window.location.href= ' http://localhost/QLSV/KhoaList_Controller'</script>";              
                }

                else{
                    echo "<script> alert('Thêm mới thất bại'); </script>";
                }

            }
           }
        }

        $this->view('MasterLayout', [
            'page'=>'ThemKhoa_View',
            'mk'=>$mk,
            'tenk'=>$tenk
        ]);


    }
}
