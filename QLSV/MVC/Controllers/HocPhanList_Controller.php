<?php

// session_start();

class HocPhanList_Controller extends controller
{
    protected $dshp;

    //Hàm mở danh sách
    function __construct()
    {
        $this->dshp = $this->model('hocphan');
    }


    //Hàm hiển thị giao diện
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'ListHocPhan_View',
            'dulieu' => $this->dshp->hocphan_find('', '')
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

    function xoa($mhp)
    {
        $kq = $this->dshp->hocphan_del($mhp);
        if ($kq) {
            echo "<script> alert('Xóa thành công!')</script>";
        } else {
            echo "<script> alert('Xóa thất bại!')</script>";
        }
        $this->view('MasterLayout', [
            'page' => 'ListHocPhan_View',
            'dulieu' => $this->dshp->hocphan_find('', '')
        ]);
    }


    //Sửa
    function sua($mhp)
    {
        $this->view('MasterLayout', [
            'page' => 'SuaHocPhan_View',
            'dulieu'=>$this->dshp->hocphan_find($mhp, '')
        ]);
    }

    function suadl()
    {
        if (isset($_POST['btnSua'])) {
            $mhp = $_POST['txtMaHP'];
            $tenhp = $_POST['txtTenHP'];
            $kh = $_POST['txtKiHoc'];
            $dhp = $_POST['txtDiemHP'];
            $msv = $_POST['txtMaSV'];
            $mgv = $_POST['txtMaGV'];
            $mn = $_POST['txtMaNganh'];
            $mk = $_POST['txtMaKhoa'];

            $kq = $this->dshp->hocphan_upd($mhp, $tenhp, $kh, $dhp, $msv, $mgv, $mn, $mk);
            if ($kq) {
                echo "<script> alert('Sửa thành công!')</script>";
            } else {
                echo "<script> alert('Sửa thất bại!')</script>";
            }

            $this->view('MasterLayout', [
                'page' => 'ListHocPhan_View',
                'dulieu' => $this->dshp->hocphan_find('', '')
            ]);
        }


        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayout', [
                'page' => 'ListHocPhan_View',
                'dulieu' => $this->dshp->hocphan_find('', '')
            ]);
        }
    }

    function timkiem()
    {
        if (isset($_POST['btnSearch'])) {
            $mhp = $_POST['txtMaHP'];
            $tenhp = $_POST['txtTenHP'];
            $this->view('MasterLayout', [
                'page' => 'ListHocPhan_View',
                'dulieu' => $this->dshp->hocphan_find($mhp, $tenhp),
                'mhp' => $mhp,
                'tenhp' => $tenhp
            ]);
        }
    }
}
