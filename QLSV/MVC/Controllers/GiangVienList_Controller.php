<?php

// session_start();

class GiangVienList_Controller extends controller
{
    protected $dsgv;

    //Hàm mở danh sách
    function __construct()
    {
        $this->dsgv = $this->model('giangvien');
    }


    //Hàm hiển thị giao diện
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'ListGiangVien_View',
            'dulieu' => $this->dsgv->giangvien_find('', '')
        ]);
    }

    //Xóa
    // function xoa($mkm){
    //     $hasForeignKey = $this->dskm->checkForeignKey($mkm);

    //     if(!$hasForeignKey){
    //         $kq = $this->dskm->khuyenmai_del($mkm);
    //     if($kq){
    //         echo "<script> alert('Xóa thành công!')</script>";
    //     }
    //     else{
    //         echo "<script> alert('Xóa thất bại!')</script>";
    //     }
    //     $this->view('MasterLayout',[
    //         'page'=>'DanhSach_KhuyenMai',
    //         'dulieu'=>$this->dskm->khuyenmai_find('', '')   
    //     ]);
    //     }
    //     else{
    //         echo "<script> alert('Không thể xóa')</script>";
    //     }

    //     $this->view('MasterLayout',[
    //         'page'=>'DanhSach_KhuyenMai',
    //         'dulieu'=>$this->dskm->khuyenmai_find('', '')   
    //     ]);

    // }

    function xoa($mgv)
    {
        $kq = $this->dsgv->giangvien_del($mgv);
        if ($kq) {
            echo "<script> alert('Xóa thành công!')</script>";
        } else {
            echo "<script> alert('Xóa thất bại!')</script>";
        }
        $this->view('MasterLayout', [
            'page' => 'ListGiangVien_View',
            'dulieu' => $this->dsgv->giangvien_find('', '')
        ]);
    }


    //Sửa
    function sua($mgv)
    {
        $this->view('MasterLayout', [
            'page' => 'SuaGiangVien_View',
            'dulieu'=>$this->dsgv->giangvien_find($mgv, '')
        ]);
    }

    function suadl()
    {
        if (isset($_POST['btnSua'])) {
            $mgv = $_POST['txtMaGV'];
            $tengv = $_POST['txtTenGV'];
            $sdt = $_POST['txtSDT'];
            $ns = $_POST['txtNS'];
            $email = $_POST['txtEmail'];
            $mk = $_POST['txtMaKhoa'];

            $kq = $this->dsgv->giangvien_upd($mgv, $tengv, $sdt, $ns, $email, $mk);
            if ($kq) {
                echo "<script> alert('Sửa thành công!')</script>";
            } else {
                echo "<script> alert('Sửa thất bại!')</script>";
            }

            $this->view('MasterLayout', [
                'page' => 'ListGiangVien_View',
                'dulieu' => $this->dsgv->giangvien_find('', '')
            ]);
        }


        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayout', [
                'page' => 'ListGiangVien_View',
                'dulieu' => $this->dsgv->giangvien_find('', '')
            ]);
        }
    }

    function timkiem()
    {
        if (isset($_POST['btnSearch'])) {
            $mgv = $_POST['txtMaGV'];
            $tengv = $_POST['txtTenGV'];
            $this->view('MasterLayout', [
                'page' => 'ListGiangVien_View',
                'dulieu' => $this->dsgv->giangvien_find($mgv, $tengv),
                'mgv' => $mgv,
                'tengv' => $tengv
            ]);
        }
    }
}
