<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="username">
        <input type="password" name="password">
        <button type="submit" name="btn-login">Login</button>
    </form>
    <!-- form đăng nhập -->
    <?php
    session_start(); //bắt đầu session
    /*
            session là một phiên làm việc giữa client và server 
            Một session bắt đầu khi client gửi request đến server, 
            nó tồn tại xuyên suốt từ trang này đến trang khác trong 
            ứng dụng web và chỉ kết thúc khi hết thời gian timeout 
            hoặc khi bạn đóng ứng dụng. 
            Giá trị của session sẽ được lưu trong biến $_SESSION
        */
    include "../model/connect.php"; //import file connect.php
    $query = "select * from userList"; //câu lệnh lấy toàn bộ dữ liệu từ bảng users trong DB
    $users = getAll($query); //thực hiện lấy dữ liệu và gán cho biến $users
    if (isset($_POST["btn-login"])) { //kiểm tra xem button login đã được ấn hay chưa
        if (!$_POST["username"] == "" && !$_POST["password"] == "") { //kiểm tra xem username và password có trống hay không
            foreach ($users as $value) { //lặp để kiểm tra dữ liệu nhập vào form và dữ liệu trong DB
                if ($_POST["username"] == $value["username"] && $_POST["password"] == $value["password"]) { // kiểm tra xem username và password nhập vào có trùng với username và password trong DB hay không

                    $_SESSION["username"] = $_POST["username"]; //nếu khớp dữ liệu trong DB thì gán dữ liệu username vào session thông qua key là username
                    $userSign = $_POST["username"];
                    $queryuser = "select * from userList where username='$userSign'";
                    $item = getOne($queryuser);
                    // echo "<pre>";
                    // var_dump($item);die;
                    if ($item["level"] == 0) {
                        header("location:../admin.php");
                    } else {
                        header("location:../index.php");
                    }
                    $_SESSION["avartar"] = $item["avartar"];
                }
            }
        } 
        else {
            echo "Mời nhập "; //nếu dữ liệu nhập vào không đúng thì thông báo lỗi và giữ nguyên trang login
        }
    }
   
    ?>
</body>

</html>