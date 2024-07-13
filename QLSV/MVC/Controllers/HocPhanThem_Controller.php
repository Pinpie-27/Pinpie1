<?php

class HocPhanThem_Controller extends controller{
    protected $hp;

    function __construct(){
        $this->hp=$this->model('hocphan');
    }

    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'ThemHocPhan_View',
            'mhp'=>'',
            'tenhp'=>'',
            'kh'=>'',
            'dhp'=>'',
            'msv'=>'',
            'mgv'=>'',
            'mn'=>'',
            'mk'=>''
        ]);
    }

    function themmoi(){
        if(isset($_POST['btnLuu'])){
            //Lấy dữ liệu trên các control của form
            $mhp = $_POST['txtMaHP'];
            $tenhp = $_POST['txtTenHP'];
            $kh = $_POST['txtKiHoc'];
            $dhp = $_POST['txtDiemHP'];
            $msv = $_POST['txtMaSV'];
            $mgv = $_POST['txtMaGV'];
            $mn = $_POST['txtMaNganh'];
            $mk = $_POST['txtMaKhoa'];

            //Kiểm tra nhập đầy đủ thông tin
            if($mhp == '' || $tenhp == '' || $kh == '' || $dhp == '' || $msv == '' || $mgv == ''|| $mn == '' || $mk == ''){
                echo "<script> alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            }
            
            //Kiểm tra trùng id
           else{
            $chkid = $this->hp->checksameid($mhp);
            if($chkid){
                echo "<script> alert('Trùng mã học phần!')</script>";
            }
            else{
                $kq = $this->hp->hocphan_ins($mhp, $tenhp, $kh, $dhp, $msv, $mgv, $mn, $mk);

                if($kq){
                    echo "<script> alert('Thêm mới thành công'); </script>"; 
                    echo "<script> window.location.href= ' http://localhost/QLSV/HocPhanList_Controller'</script>";              
                }

                else{
                    echo "<script> alert('Thêm mới thất bại'); </script>";
                }

            }
           }
        }

        $this->view('MasterLayout', [
            'page'=>'ThemHocPhan_View',
            'mhp'=>$mhp,
            'tenhp'=>$tenhp,
            'kh'=>$kh,
            'dhp'=>$dhp,
            'msv'=>$msv,
            'mgv'=>$mgv,
            'mn'=>$mn,
            'mk'=>$mk
        ]);


    }
}
