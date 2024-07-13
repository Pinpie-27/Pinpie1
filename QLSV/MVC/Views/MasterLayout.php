<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    body,
    .wrapper,
    .aside {
        width: 100%;
    }

    body {
        background-color: #f5f8fa;
    }

    .wrapper {
        display: flex;
    }

    .aside {
        margin-left: 0px;
    }
</style>

<body>
    <div class="wrapper">
        <?php
            include_once "MVC/Views/Pages/giaodien_admin.php";
        ?>
    </div>

    <div class="aside">
        <?php
        if (isset($data['page'])) {
            include_once './MVC/Views/Pages/' . $data['page'] . '.php';
        }
        ?>
    </div>


</body>

</html>