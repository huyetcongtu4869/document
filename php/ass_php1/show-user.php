<?php
include "./model/connect.php";
$query = "select * from userlist";
$userlist = getAll($query);
// echo "<pre>";
// var_dump($products);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./src/style.css">
    <link rel="stylesheet" href="./src/admin.css">
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
                <h1>Quản lý sản phẩm</h1>
            </div>
            <div class="control-product">
                <div class="control">
                    <div class="title">
                        <h3>Danh sách sản phẩm</h3>
                    </div>
                    <div class="control-action">
                        <div class="search">
                            <?php
                           if (isset($_POST["btn-search"])) {
                            $username = $_POST["username"];
                            $query = "select * from userList Where username Like '$username%'";
                            $item = getAll($query);
                            // echo "<pre>";
                            // var_dump($item);                  
                                 }
                            ?>
                            <form action="search-user.php" method="post">
                                <input type="text" name="username" placeholder="Aspen Weste" value="">
                                <a href="search-user.php?id=<?php echo $value["id"] ?>"><button id="search" name="btn-search"><img src="./image/img-daboard/Search.png" alt=""></button></a>
                            </form>
                        </div>
                        <a href="./view/add-new-user.php"><button class="add">Add New User</button></a>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Avartar</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userlist as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $value["username"] ?></td>
                                <td class="img-table">
                                    <div><img src="<?php echo $value["avartar"] ?>" alt=""></div>
                                </td>
                                <td><?php echo $value["password"] ?></td>
                                <td class="action">
                                    <a href="./view/update-user.php?id=<?php echo $value["Id"] ?>"><button class="up">Update</button></a>
                                    <a href="./controller/delete-user.php?id=<?php echo $value["Id"] ?>"><button class="de" onclick="return confirm('Bạn có xác nhận xóa không?')">Delete</button></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </nav>

    </div>
</body>

</html>