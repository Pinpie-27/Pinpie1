<?php

// session_start();

class NganhList_Controller extends controller
{
    protected $dsn;

    //Hàm mở danh sách
    function __construct()
    {
        $this->dsn = $this->model('nganh');
    }


    //Hàm hiển thị giao diện
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'ListNganh_View',
            'dulieu' => $this->dsn->nganh_find('', '')
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

    function xoa($mn)
    {
        $kq = $this->dsn->nganh_del($mn);
        if ($kq) {
            echo "<script> alert('Xóa thành công!')</script>";
        } else {
            echo "<script> alert('Xóa thất bại!')</script>";
        }
        $this->view('MasterLayout', [
            'page' => 'ListNganh_View',
            'dulieu' => $this->dsn->nganh_find('', '')
        ]);
    }


    //Sửa
    function sua($mn)
    {
        $this->view('MasterLayout', [
            'page' => 'SuaNganh_View',
            'dulieu' => $this->dsn->nganh_find($mn, '')
        ]);
    }

    function suadl()
    {
        if (isset($_POST['btnSua'])) {
            $mn = $_POST['txtMaNganh'];
            $tenn = $_POST['txtTenNganh'];
            $mk = $_POST['txtMaKhoa'];

            $kq = $this->dsn->nganh_upd($mn, $tenn, $mk);
            if ($kq) {
                echo "<script> alert('Sửa thành công!')</script>";
            } else {
                echo "<script> alert('Sửa thất bại!')</script>";
            }

            $this->view('MasterLayout', [
                'page' => 'ListNganh_View',
                'dulieu' => $this->dsn->nganh_find('', '')
            ]);
        }


        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayout', [
                'page' => 'ListNganh_View',
                'dulieu' => $this->dsn->nganh_find('', '')
            ]);
        }
    }

    function timkiem()
    {
        if (isset($_POST['btnSearch'])) {
            $mn = $_POST['txtMaNganh'];
            $tenn = $_POST['txtTenNganh'];
            $this->view('MasterLayout', [
                'page' => 'ListNganh_View',
                'dulieu' => $this->dsn->lop_find($mn, $tenn),
                'mn' => $mn,
                'tenn' => $tenn
            ]);
        }
    }
}
