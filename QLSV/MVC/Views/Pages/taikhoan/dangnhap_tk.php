<?php
if (isset($_POST['login'])) {
    if (isset($_SESSION['username'])) {
        header("Location: http://localhost/QLSV/giaodien_admin");
        exit();
    }
}

if (isset($_SESSION['username'])) {
    header("Location: http://localhost/QLSV/giaodien_admin");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- <link rel="stylesheet" href="http://localhost/QLSV/Public/Css/auth.css" /> -->

    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/auth.css" />
</head>

<body>
    <div class="auth">
        <div class="auth-container">
            <div class="container-left">
                <img style="height:370px" src="http://localhost/QLSV/Public/Images/login_main.png" alt="hrlo">
                <h1>Chào mừng bạn đến với HHKM</h1>
                <h3>Hệ thống quản lý trường học thông minh</h3>
                <h3>Tích hợp công nghệ thông tin, AI...</h3>
                <lord-icon src="https://cdn.lordicon.com/rymzvwiu.json" trigger="loop" style="width:250px;height:250px">
                </lord-icon>
            </div>
            <div class="container-right">
                <h1>Đăng nhập</h1>
                <form method="POST" action="http://localhost/QLSV/taikhoan/dangnhap">
                    <div class="mb-3">
                        <label for="username" class="form-label">Địa chỉ username</label>
                        <input name="username" required placeholder="Địa chỉ username" type="text" class="form-control">
                        <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="pasword" class="form-label">Mật khẩu</label>
                        <input name="password" required placeholder="Mật khẩu" type="password" class="form-control" id="pasword">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember</label>
                    </div>
                    <button name="login" type="submit" class="btn-signIn btn btn-primary">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>


</body>

</html>