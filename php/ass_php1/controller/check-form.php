<?php
// var_dump($_POST);die;
$id = $_POST["id"]; //lấy id được truyền đi từ form update
$username = $_POST["username"];
$password = $_POST["password"];
$repassword=$_POST['repassword'];
$avartar = $_FILES["avartar"]["name"];
if ($password!=$repassword) {
    echo
}

?>