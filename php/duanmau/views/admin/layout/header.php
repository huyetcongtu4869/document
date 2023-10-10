<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/admin/style.css">
    <script src="https://kit.fontawesome.com/7f94bdf8ac.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <menu>
            <div class="logo"><img src="" alt=""></div>
            <hr>
            <nav>
                <ul>
                    <li><img src="public/img/admin/dashboard.png" alt=""><a href="#">Dashboard</a></li>
                    <li><img src="public/img/admin/quanli.png" alt=""><a href="?ctr=list_products">Quản lý sản phẩm</a></li>
                    <li><img src="public/img/admin/quanli.png" alt=""><a href="?ctr=list_users">Quản lý user</a></li>
                    <li><img src="public/img/admin/quanli.png" alt=""><a href="?ctr=list_categorys">Quản lý danh mục</a></li>
                    <li><img src="public/img/admin/thongke.png" alt=""><a href="dashboad.php">Thống kê</a></li>
                </ul>
            </nav>
        </menu>
        <main>
            <div class="acc">
            <?php
            session_start();
            if (isset($_SESSION["userName"])) {
                echo " 
                <div class='ring'><img src='public/img/admin/ring.png'></div>
                <div class='user'>
                <p>Xin chào,</p>
                <p class='nu'>
                ";
                echo $_SESSION["userName"];
                echo "
                </p>
                </div>
                <div class='avartar'><img src='public/img/img-user/".$_SESSION["avartar"];
                echo "
                '></div>
                ";
            }
            ?>
            </div>
            <hr>
            <div class="banner">
                <div class="background"><img src="public/img/admin/banner.png" alt=""></div>