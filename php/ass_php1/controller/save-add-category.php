<?php
    include "../model/connect.php"; //import file connect.php từ thư mục model
    $categoryName = $_POST["categoryName"];
    $categoryImage = $_FILES["categoryImage"]["name"];

    $id = $_POST["id"];  
    $query = "insert into categoryname(categoryName,categoryImage) values ('$categoryName','./image/img-products/$categoryImage')";
    move_uploaded_file($_FILES["productImage"]["tmp_name"],"../image/img-products".$_FILES["productImage"]["name"]);

    connect($query); 
    header("location:../show-category.php"); 
?>