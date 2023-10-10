<?php
    // echo "<pre>";
    // var_dump($_POST);
    // var_dump($_FILES);die;
    include "../model/connect.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $avartar = $_FILES["avartar"]["name"];
    $level=$_POST["level"];
    $query = "insert into userList(username,password,avartar,level) values('$username',$password,'./image/avartar/$avartar',$level)";
    connect($query);

    move_uploaded_file($_FILES["avartar"]["tmp_name"],"../image/avartar/".$_FILES["avartar"]["name"]);

    header("location:../index.php");
