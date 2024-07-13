<?php

class NganhThem_Controller extends controller{
    protected $nganh;

    function __construct(){
        $this->nganh=$this->model('nganh');
    }

    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'ThemNganh_View',
            'mn'=>'',
            'tenn'=>'',
            'mk'=>'',
        ]);
    }

    function themmoi(){
        if(isset($_POST['btnLuu'])){
            //Lấy dữ liệu trên các control của form
            $mn = $_POST['txtMaNganh'];
            $tenn = $_POST['txtTenNganh'];
            $mk = $_POST['txtMaKhoa'];

            //Kiểm tra nhập đầy đủ thông tin
            if($mn == '' || $tenn == '' || $mk == ''){
                echo "<script> alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            }
            
            //Kiểm tra trùng id
           else{
            $chkid = $this->nganh->checksameid($mn);
            if($chkid){
                echo "<script> alert('Trùng mã ngành!')</script>";
            }
            else{
                $kq = $this->nganh->nganh_ins($mn, $tenn, $mk);

                if($kq){
                    echo "<script> alert('Thêm mới thành công'); </script>"; 
                    echo "<script> window.location.href= ' http://localhost/QLSV/NganhList_Controller'</script>";              
                }

                else{
                    echo "<script> alert('Thêm mới thất bại'); </script>";
                }

            }
           }
        }

        $this->view('MasterLayout', [
            'page'=>'ThemNganh_View',
            'mn'=>$mn,
            'tenn'=>$tenn,
            'mk'=>$mk
        ]);
    }
}
