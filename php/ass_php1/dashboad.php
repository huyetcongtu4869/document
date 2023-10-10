<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./src/style.css">
    <link rel="stylesheet" href="./src/daboard.css">
</head>

<body>
    <div class="container">
        <menu>
            <div class="logo"><img src="image/img-daboard/logo.png" alt=""></div>
            <ul>
                <li><img src="image/img-daboard/dashboard.png" alt=""><a href="dashboad.php">Dashboard</a></li>
                <li><img src="image/img-daboard/quanlisanpham.png" alt=""><a href="admin.php">Quản lý sản phẩm</a></li>
                <li><img src="image/img-daboard/quanlisanpham.png" alt=""><a href="show-user.php">Quản lý user</a></li>
                <li><img src="image/img-daboard/danhmuc.png" alt=""><a href="show-category.php">Quản lý danh mục</a></li>
                <li><img src="image/img-daboard/thongke.png" alt=""><a href="dashboad.php">Thống kê</a></li>
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
                <h1>Welcome to Dashboard</h1>
            </div>
        </nav>
    </div>
</body>

</html>