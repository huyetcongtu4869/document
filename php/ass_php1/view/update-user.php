<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="../src/style.css">
    <link rel="stylesheet" href="../src/add-new.css">
    <style>
        button {
            background: #1E74A4;
        }
    </style>
</head>

<body>

    <div class="container">
        <menu>
            <div class="logo"><img src="../image/img-daboard/logo.png" alt=""></div>
            <ul>
                <li><img src="../image/img-daboard/dashboard.png" alt=""><a href="../dashboad.php">Dashboard</a></li>
                <li><img src="../image/img-daboard/quanlisanpham.png" alt=""><a href="../admin.php">Quản lý sản phẩm</a></li>
                <li><img src="../image/img-daboard/quanlisanpham.png" alt=""><a href="../show-user.php">Quản lý user</a></li>
                <li><img src="../image/img-daboard/danhmuc.png" alt=""><a href="../show-category.php">Quản lý danh mục</a></li>
                <li><img src="../image/img-daboard/thongke.png" alt=""><a href="../dashboad.php">Thống kê</a></li>
            </ul>
        </menu>
        <nav>
            <div class="user-signin">
                <?php
                session_start(); //bắt đầu session
                if (isset($_SESSION["username"])) { //kiểm tra xem trong session có tồn tại username hay không, nếu tồn tại thì hiển thị nội dung bên dưới
                    echo "<div class='ring'><img src='image/img-daboard/ring.png' alt=''></div>";
                    echo "<div class='user'>";
                    echo "<p>";
                    echo $_SESSION["username"]; //hiển thị username
                    echo "</p>";
                    echo "</div>";
                    echo "<div class='avartar'><img src='";
                    echo $_SESSION["avartar"];
                    echo "' width='100%' height='100%'></div>";
                    echo "<a href='./controller/logout.php'><button>Logout</button></a>"; //thẻ a điều hướng sang logout.php trong thư mục controller để xử lý việc logout
                } else {
                    echo "<a href='./view/login.php'><button class='btn-login'>Đăng Nhập</button></a>";
                    echo "<a href=''><button class='register'>Đăng ký</button></a>";
                }
                ?>
            </div>
            <hr>
            <div class="banner">
                <h2>Cập nhật sản phẩm</h2>
            </div>
            <?php
            include "../model/connect.php";
            $id = $_GET["id"];
            $query = "select * from userlist where id=$id";
            $item = getOne($query);
            //  echo "<pre>";
            //  var_dump($item);
            ?>
            <form action="../controller/save-update-user.php" method="post" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo $id ?>" hidden>
                <label for="">User Name</label><br>
                <input type="text" name="username" id="username" placeholder="Nhập User Name" value="<?php echo $item["username"] ?>"><br>
                <label for="">Password</label><br>
                <input type="text" name="password" id="password" placeholder="Nhập password" value="<?php echo $item["password"] ?>"><br>
                <label for="">Repassword</label><br>
                <input type="text" name="repassword" id="repassword" placeholder="Nhập repassword" value="<?php echo $item["password"] ?>"><br>
                <label for="">Avartar</label><br>
                <input id="file" type="file" name="avartar" value="<?php echo $item["avartar"] ?>"><br>
                <div class="btn"><button type="submit" name="btn-post" id="btn" >Update User</button></div>
                <?php

                ?>
            </form>
        </nav>
    </div>
    <script src="../index.js"></script>
</body>

</html>