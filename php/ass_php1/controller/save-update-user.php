<?php
include "../model/connect.php";

// var_dump($_POST);die;

$id = $_POST["id"]; //lấy id được truyền đi từ form update
$username = $_POST["username"];
$password = $_POST["password"];
$avartar = $_FILES["avartar"]["name"];

$query = "";
// câu lệnh cập nhật dữ liệu vào DB dựa vào id
if ($avartar != "") {
    $query = "UPDATE userList
        SET username = '$username' , password = '$password',avartar='./image/avartar/$avartar'
        WHERE Id=$id";
} else {
    $query = "UPDATE userList
    SET username = '$username' , password = '$password'
    WHERE Id=$id";
}
connect($query); //gọi hàm connect từ file connect.php ở thư mục model

header("location:../show-user.php"); //điều hướng về trang chủ
?>