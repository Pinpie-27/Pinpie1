<?php
if (isset($_POST['logout'])) {
    unset($_SESSION['username']);
    header("Location:  http://localhost/QLSV/taikhoan");
    exit();
}

if (!isset($_SESSION['username'])) {
    header("Location: http://localhost/QLSV/taikhoan");
}


// echo $_SESSION['username'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <link rel="stylesheet" href="http://localhost/Quanlysinhvien/Public/Css/giaodien_admin.css">
</head>

<body>
    <nav class="menu">
        <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>

        <div class="nav-header">
            <img src="http://localhost/QLSV/Public/Images/login_main.png" alt="Ảnh chưa hiển thị">
            <lord-icon class="icon-nav" src="https://cdn.lordicon.com/jxwksgwv.json" trigger="hover" colors="primary:#fff">
            </lord-icon>
        </div>
        <div class="features">

        </div>
        <div class="memu_main">
            <div class="nav-container-item">
                <lord-icon class="container-icon" src="https://cdn.lordicon.com/osuxyevn.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
                <a href="">Trang chủ</a>
            </div>

            <div class="nav-container-item" id="toggleDropdownKhoa" onmouseenter="showMenu('menuSubKhoa')" onclick="toggleMenu('menuSubKhoa')">
                <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/727-spinner-dashes.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
                <a href="#">Khoa</a>
                <lord-icon class="container-arrow" src="https://cdn.lordicon.com/rxufjlal.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
            </div>
            <div class="menu-sub" id="menuSubKhoa" onmouseleave="hideMenu('menuSubKhoa')">
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/76-newspaper.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="http://localhost/QLSV/KhoaList_Controller">Danh sách khoa</a>
                </div>
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/40-add-card.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="http://localhost/QLSV/KhoaThem_Controller">Thêm khoa</a>
                </div>
            </div>

            <div class="nav-container-item" id="toggleDropdownNganh" onmouseenter="showMenu('menuSubNganh')" onclick="toggleMenu('menuSubNganh')">
                <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/45-category.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
                <a href="#">Ngành</a>
                <lord-icon class="container-arrow" src="https://cdn.lordicon.com/rxufjlal.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
            </div>
            <div class="menu-sub" id="menuSubNganh" onmouseleave="hideMenu('menuSubNganh')">
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/14-article.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="http://localhost/QLSV/NganhList_Controller">Danh sách ngành</a>
                </div>
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/40-add-card.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="http://localhost/QLSV/NganhThem_Controller">Thêm ngành</a>
                </div>
            </div>

            <div class="nav-container-item" id="toggleDropdownLop" onmouseenter="showMenu('menuSubLop')" onclick="toggleMenu('menuSubLop')">
                <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/83-exit-room.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
                <a href="#">Lớp</a>
                <lord-icon class="container-arrow" src="https://cdn.lordicon.com/rxufjlal.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
            </div>
            <div class="menu-sub" id="menuSubLop" onmouseleave="hideMenu('menuSubLop')">
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/120-text-snippet.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="http://localhost/QLSV/LopList_Controller">Danh sách lớp</a>
                </div>
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/40-add-card.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="http://localhost/QLSV/LopThem_Controller">Thêm lớp</a>
                </div>
            </div>

            <div class="nav-container-item" id="toggleDropdownGV" onmouseenter="showMenu('menuSubGV')" onclick="toggleMenu('menuSubGV')">
                <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/187-contacts.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
                <a href="#">Giảng viên</a>
                <lord-icon class="container-arrow" src="https://cdn.lordicon.com/rxufjlal.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
            </div>
            <div class="menu-sub" id="menuSubGV" onmouseleave="hideMenu('menuSubGV')">
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/96-groups.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="http://localhost/QLSV/GiangVienList_Controller">Danh sách giảng viên</a>
                </div>
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/40-add-card.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="http://localhost/QLSV/GiangVienThem_Controller">Thêm giảng viên</a>
                </div>
            </div>

            <div class="nav-container-item" id="toggleDropdownHP" onmouseenter="showMenu('menuSubHP')" onclick="toggleMenu('menuSubHP')">
                <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/19-book.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
                <a href="#">Học phần</a></a>
                <lord-icon class="container-arrow" src="https://cdn.lordicon.com/rxufjlal.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
            </div>
            <div class="menu-sub" id="menuSubHP" onmouseleave="hideMenu('menuSubHP')">
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/44-folder.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="http://localhost/QLSV/HocPhanList_Controller">Danh sách học phần</a>
                </div>
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/40-add-card.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="http://localhost/QLSV/HocPhanThem_Controller">Thêm học phần</a>
                </div>
            </div>

            <div class="nav-container-item" id="toggleDropdownSV" onmouseenter="showMenu('menuSubSV')" onclick="toggleMenu('menuSubSV')">
                <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/8-account.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
                <a href="">Sinh viên</a>
                <lord-icon class="container-arrow" src="https://cdn.lordicon.com/rxufjlal.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
            </div>
            <div class="menu-sub" id="menuSubSV" onmouseleave="hideMenu('menuSubSV')">
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/96-groups.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="http://localhost/QLSV/SinhVienList_Controller">Danh sách sinh viên</a>
                </div>
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/40-add-card.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="http://localhost/QLSV/SinhVienThem_Controller">Thêm sinh viên</a>
                </div>
            </div>

            <!-- <div class="nav-container-item" id="toggleDropdownDiemHP" onmouseenter="showMenu('menuSubDiemHP')" onclick="toggleMenu('menuSubDiemHP')">
                <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/114-edit-pencil-rename.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
                <a href="#">Điểm học phần</a>
                <lord-icon class="container-arrow" src="https://cdn.lordicon.com/rxufjlal.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
            </div>
            <div class="menu-sub" id="menuSubDiemHP" onmouseleave="hideMenu('menuSubDiemHP')">
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/189-domain-verification.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="">Danh sách điểm học phần</a>
                </div>
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/40-add-card.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="">Thêm điểm học phần</a>
                </div>
            </div>

            <div class="nav-container-item" id="toggleDropdownQuanly" onmouseenter="showMenu('menuSubQuanly')" onclick="toggleMenu('menuSubQuanly')">
                <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/63-settings-cog.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
                <a href="#">Quản lý</a>
                <lord-icon class="container-arrow" src="https://cdn.lordicon.com/rxufjlal.json" trigger="hover" colors="primary:#fff">
                </lord-icon>
            </div>
            <div class="menu-sub" id="menuSubQuanly" onmouseleave="hideMenu('menuSubQuanly')">
                <div class="sub-item">
                    <lord-icon class="container-icon" src="https://lordicon.com/icons/system/regular/169-view-in-ar.json" trigger="hover" colors="primary:#fff">
                    </lord-icon>
                    <a href="">Tài khoản</a>
                </div>
            </div> -->

            <script>
                // function showMenu(menuId) {
                //     var menu = document.getElementById(menuId);
                //     menu.style.display = 'block';
                // }

                function hideMenu(menuId) {
                    var menu = document.getElementById(menuId);
                    menu.style.display = 'none';
                }

                function toggleMenu(menuId) {
                    var menu = document.getElementById(menuId);
                    if (menu.style.display === 'block') {
                        menu.style.display = 'none';
                    } else {
                        menu.style.display = 'block';
                    }
                }

                window.onload = function() {
                    var menus = document.getElementsByClassName("menu-sub");
                    for (var i = 0; i < menus.length; i++) {
                        menus[i].style.display = 'none';
                    }
                };
            </script>


        </div>
        <div class="nav-footer">
            <form method="post">
                <input name = "logout" type="submit" value="Đăng xuất">
            </form>
        </div>
        </div>
    </nav>

</body>

<script>
    document.getElementById("logoutButton").addEventListener("click", function() {
        // Gửi yêu cầu tới trang logout.php để xóa session và chuyển hướng đến trang đăng nhập
        fetch("http://localhost/QLSV/Views/Pages/taikhoan/logout.php", {
            method: "POST"
        }).then(function(response) {
            // Chuyển hướng người dùng đến trang đăng nhập
            window.location.href = "http://localhost/QLSV/taikhoan";
        });
    });
</script>

</html>