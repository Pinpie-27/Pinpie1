<?php

// session_start();

class LopList_Controller extends controller
{
    protected $dsl;

    //Hàm mở danh sách
    function __construct()
    {
        $this->dsl = $this->model('lop');
    }


    //Hàm hiển thị giao diện
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'ListLop_View',
            'dulieu' => $this->dsl->lop_find('', '')
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

    function xoa($ml)
    {
        $kq = $this->dsl->lop_del($ml);
        if ($kq) {
            echo "<script> alert('Xóa thành công!')</script>";
        } else {
            echo "<script> alert('Xóa thất bại!')</script>";
        }
        $this->view('MasterLayout', [
            'page' => 'ListLop_View',
            'dulieu' => $this->dsl->lop_find('', '')
        ]);
    }


    //Sửa
    function sua($ml)
    {
        $this->view('MasterLayout', [
            'page' => 'SuaLop_View',
            'dulieu' => $this->dsl->lop_find($ml, '')
        ]);
    }

    function suadl()
    {
        if (isset($_POST['btnSua'])) {
            $ml = $_POST['txtMaLop'];
            $tenl = $_POST['txtTenLop'];

            $kq = $this->dsl->lop_upd($ml, $tenl);
            if ($kq) {
                echo "<script> alert('Sửa thành công!')</script>";
            } else {
                echo "<script> alert('Sửa thất bại!')</script>";
            }

            $this->view('MasterLayout', [
                'page' => 'ListLop_View',
                'dulieu' => $this->dsl->lop_find('', '')
            ]);
        }


        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayout', [
                'page' => 'ListLop_View',
                'dulieu' => $this->dsl->lop_find('', '')
            ]);
        }
    }

    function timkiem()
    {
        if (isset($_POST['btnSearch'])) {
            $ml = $_POST['txtMaLop'];
            $tenl = $_POST['txtTenLop'];
            $this->view('MasterLayout', [
                'page' => 'ListLop_View',
                'dulieu' => $this->dsl->lop_find($ml, $tenl),
                'ml' => $ml,
                'tenl' => $tenl
            ]);
        }
    }
}
