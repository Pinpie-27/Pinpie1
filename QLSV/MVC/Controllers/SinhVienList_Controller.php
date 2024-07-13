<?php

// session_start();

class SinhVienList_Controller extends controller
{
    protected $dssv;

    //Hàm mở danh sách
    function __construct()
    {
        $this->dssv = $this->model('sinhvien');
    }


    //Hàm hiển thị giao diện
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'ListSinhVien_View',
            'dulieu' => $this->dssv->sinhvien_find('', '')
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

    // function xoa($msv)
    // {
    //     $kq = $this->dssv->sinhvien_del($msv);
    //     if ($kq) {
    //         echo "<script> alert('Xóa thành công!')</script>";
    //     } else {
    //         echo "<script> alert('Xóa thất bại!')</script>";
    //     }
    //     $this->view('MasterLayout', [
    //         'page' => 'SinhVienList_Controller',
    //         'dulieu' => $this->dssv->sinhvien_find('', '')
    //     ]);
    // }

    function xoa($msv)
    {
        $kq = $this->dssv->sinhvien_find($msv, ''); // Truyền thêm tham số rỗng
        if ($kq) {
            $row = mysqli_fetch_assoc($kq);
            $anh = $row['anh'];
            $path = __DIR__ . '/uploads/' . $anh;

            // Xóa tệp hình ảnh
            if (file_exists($path) && unlink($path)) {
                // Sau khi xóa hình ảnh thành công, tiếp tục xóa sản phẩm khỏi cơ sở dữ liệu
                $kq_xoa = $this->dssv->sinhvien_del($msv);
                if ($kq_xoa) {
                    echo "<script> alert('Xóa thành công!')</script>";
                    // echo "<script> window.location.href= 'http://localhost/BHST/SanPham_DanhSach'</script>";
                } else {
                    echo "<script> alert('Xóa thất bại!')</script>";
                }
            } else {
                echo "<script> alert('Lỗi khi xóa hình ảnh!')</script>";
            }
        }

        // Sau khi xóa hoặc nếu không tìm thấy sản phẩm, điều hướng trở lại danh sách sản phẩm
        $this->view('MasterLayout', [
            'page' => 'ListSinhVien_View',
            'dulieu' => $this->dssv->sinhvien_find('', '')
            // 'dulieu' => $this->dssp->sanpham_list()
        ]);
    }


    //Sửa
    function sua($msv)
    {
        $this->view('MasterLayout', [
            'page' => 'SuaSinhVien_View',
            'dulieu'=>$this->dssv->sinhvien_find($msv, '')
        ]);
    }

    function suadl()
    {
        if (isset($_POST['btnSua'])) {
            $msv = $_POST['txtMaSV'];
            // $anh = $_POST['txtAnh'];
            $tensv = $_POST['txtTenSV'];
            $ns = $_POST['txtNS'];
            $email = $_POST['txtEmail'];
            $dc = $_POST['txtDiaChi'];
            $ml = $_POST['txtMaLop'];
            $mn = $_POST['txtMaNganh'];
            $mk = $_POST['txtMaKhoa'];
            // $idtk = $_POST['txtIDTK'];

            $anh = $_FILES['txtAnh']['name'];
            $anh_tmp = $_FILES['txtAnh']['tmp_name'];
            $anh = time() . '_' . $anh;
            $path = __DIR__ . '/uploads/';
            move_uploaded_file($anh_tmp, $path . $anh);

            $kq = $this->dssv->sinhvien_upd($msv, $anh, $tensv, $ns, $email, $dc, $ml, $mn, $mk);
            if ($kq) {
                echo "<script> alert('Sửa thành công!')</script>";
            } else {
                echo "<script> alert('Sửa thất bại!')</script>";
            }

            $this->view('MasterLayout', [
                'page' => 'ListSinhVien_View',
                'dulieu' => $this->dssv->sinhvien_find('', '')
            ]);
        }


        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayout', [
                'page' => 'ListSinhVien_View',
                'dulieu' => $this->dssv->sinhvien_find('', '')
            ]);
        }
    }

    function timkiem()
    {
        if (isset($_POST['btnSearch'])) {
            $msv = $_POST['txtMaSV'];
            $tensv = $_POST['txtTenSV'];
            $this->view('MasterLayout', [
                'page' => 'SinhVienList_Controller',
                'dulieu' => $this->dssv->sinhvien_find($msv, $tensv),
                'msv' => $msv,
                'tensv' => $tensv
            ]);
        }
    }
}
