<?php

class LopThem_Controller extends controller{
    protected $lop;

    function __construct(){
        $this->lop=$this->model('lop');
    }

    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'ThemLop_View',
            'ml'=>'',
            'tenl'=>'',
        ]);
    }

    function themmoi(){
        if(isset($_POST['btnLuu'])){
            //Lấy dữ liệu trên các control của form
            $ml = $_POST['txtMaLop'];
            $tenl = $_POST['txtTenLop'];

            //Kiểm tra nhập đầy đủ thông tin
            if($ml == '' || $tenl == ''){
                echo "<script> alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            }
            
            //Kiểm tra trùng id
           else{
            $chkid = $this->lop->checksameid($ml);
            if($chkid){
                echo "<script> alert('Trùng mã lớp!')</script>";
            }
            else{
                $kq = $this->lop->lop_ins($ml, $tenl);

                if($kq){
                    echo "<script> alert('Thêm mới thành công'); </script>"; 
                    echo "<script> window.location.href= ' http://localhost/QLSV/LopList_Controller'</script>";              
                }

                else{
                    echo "<script> alert('Thêm mới thất bại'); </script>";
                }

            }
           }
        }

        $this->view('MasterLayout', [
            'page'=>'ThemLop_View',
            'ml'=>$ml,
            'tenl'=>$tenl
        ]);


    }
}
