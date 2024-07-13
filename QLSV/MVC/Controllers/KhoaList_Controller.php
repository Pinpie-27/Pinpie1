<?php

// session_start();

class KhoaList_Controller extends controller
{
    protected $dsk;

    //Hàm mở danh sách
    function __construct()
    {
        $this->dsk = $this->model('khoa');
    }


    //Hàm hiển thị giao diện
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'ListKhoa_View',
            'dulieu' => $this->dsk->khoa_find('', '')
        ]);
    }

    //Xóa
    function xoa($mk){
        $hasForeignKey = $this->dsk->checkForeignKey($mk);
        $hasForeignKey1 = $this->dsk->checkForeignKey1($mk);


        if(!$hasForeignKey && !$hasForeignKey1){
            $kq = $this->dsk->khoa_del($mk);
        if($kq){
            echo "<script> alert('Xóa thành công!')</script>";
        }
        else{
            echo "<script> alert('Xóa thất bại!')</script>";
        }
        $this->view('MasterLayout',[
            'page'=>'ListKhoa_View',
            'dulieu'=>$this->dsk->khoa_find('', '')   
        ]);
        }
        else{
            echo "<script> alert('Không thể xóa')</script>";
        }

        $this->view('MasterLayout',[
            'page'=>'ListKhoa_View',
            'dulieu'=>$this->dsk->khoa_find('', '')   
        ]);

    }

    // function xoa($mk)
    // {
    //     $kq = $this->dsk->khoa_del($mk);
    //     if ($kq) {
    //         echo "<script> alert('Xóa thành công!')</script>";
    //     } else {
    //         echo "<script> alert('Xóa thất bại!')</script>";
    //     }
    //     $this->view('MasterLayout', [
    //         'page' => 'ListKhoa_View',
    //         'dulieu' => $this->dsk->khoa_find('', '')
    //     ]);
    // }


    //Sửa
    function sua($mk)
    {
        $this->view('MasterLayout', [
            'page' => 'SuaKhoa_View',
            'dulieu' => $this->dsk->khoa_find($mk, '')
        ]);
    }

    function suadl()
    {
        if (isset($_POST['btnSua'])) {
            $mk = $_POST['txtMaKhoa'];
            $tenk = $_POST['txtTenKhoa'];

            $kq = $this->dsk->khoa_upd($mk, $tenk);
            if ($kq) {
                echo "<script> alert('Sửa thành công!')</script>";
            } else {
                echo "<script> alert('Sửa thất bại!')</script>";
            }

            $this->view('MasterLayout', [
                'page' => 'ListKhoa_View',
                'dulieu' => $this->dsk->khoa_find('', '')
            ]);
        }


        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayout', [
                'page' => 'ListKhoa_View',
                'dulieu' => $this->dsk->khoa_find('', '')
            ]);
        }
    }

    function timkiem()
    {
        if (isset($_POST['btnSearch'])) {
            $mk = $_POST['txtMaKhoa'];
            $tenk = $_POST['txtTenKhoa'];
            $this->view('MasterLayout', [
                'page' => 'ListKhoa_View',
                'dulieu' => $this->dsk->khoa_find($mk, $tenk),
                'mk' => $mk,
                'tenk' => $tenk
            ]);
        }
    }
}
