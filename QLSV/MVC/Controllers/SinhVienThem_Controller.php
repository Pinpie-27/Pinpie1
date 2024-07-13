<?php

class SinhVienThem_Controller extends controller{
    protected $sv;

    function __construct(){
        $this->sv=$this->model('sinhvien');
    }

    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'ThemSinhVien_View',
            'msv'=>'',
            'anh'=>'',
            'tensv'=>'',
            'ns'=>'',
            'email'=>'',
            'dc'=>'',
            'ml'=>'',
            'mn'=>'',
            'mk'=>'',
            'idtk'=>''
        ]);
    }

    function themmoi(){
        if(isset($_POST['btnLuu'])){
            //Lấy dữ liệu trên các control của form
            $msv = $_POST['txtMaSV'];
            // $anh = $_POST['txtAnh'];
            $tensv = $_POST['txtTenSV'];
            $ns = $_POST['txtNS'];
            $email = $_POST['txtEmail'];
            $dc = $_POST['txtDiaChi'];
            $ml = $_POST['txtMaLop'];
            $mn = $_POST['txtMaNganh'];
            $mk = $_POST['txtMaKhoa'];
            $idtk = $_POST['txtIDTK'];

            $anh = $_FILES['txtAnh']['name'];
            $anh_tmp = $_FILES['txtAnh']['tmp_name'];
            $anh = time() . '_' . $anh;
            $path = __DIR__ . '/uploads/';
         
            //Kiểm tra nhập đầy đủ thông tin
            if($msv == '' || $anh == '' || $tensv == '' || $ns == '' || $email == '' || $dc == '' || $ml == '' || $mn == '' || $mk == '' || $idtk == ''){
                echo "<script> alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            }
            
            //Kiểm tra trùng id
           else{
            $chkid = $this->sv->checksameid($msv);
            if($chkid){
                echo "<script> alert('Trùng mã sinh viên!')</script>";
            }
            else{
                $kq = $this->sv->sinhvien_ins($msv, $anh, $tensv, $ns, $email, $dc, $ml, $mn, $mk, $idtk);

                if($kq){
                    move_uploaded_file($anh_tmp, $path . $anh);
                    echo "<script> alert('Thêm mới thành công'); </script>"; 
                    echo "<script> window.location.href= ' http://localhost/QLSV/SinhVienList_Controller'</script>";              
                }

                else{
                    echo "<script> alert('Thêm mới thất bại'); </script>";
                }

            }
           }
        }

        $this->view('MasterLayout', [
            'page'=>'ThemSinhVien_View',
            'msv'=>$msv,
            'anh'=>$anh,
            'tensv'=>$tensv,
            'ns'=>$ns,
            'email'=>$email,
            'dc'=>$dc,
            'ml'=>$ml,
            'mn'=>$mn,
            'mk'=>$mk,
            'idtk'=>$idtk
        ]);


    }
}
