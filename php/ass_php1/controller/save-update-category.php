<?php
    // echo $_FILES["productImage"];
    // echo "<pre>";
    // var_dump($_FILES);
    // var_dump($_POST);die;
    include "../model/connect.php";
    $categoryName = $_POST["categoryName"];
    $categoryImage = $_FILES["categoryImage"]["name"];
    $id = $_POST["id"];      
    $query = "";
    if (  $categoryImage!="") {
        $query = "UPDATE categoryname SET categoryName = '$categoryName',categoryImage = './image/img-products/$categoryImage' WHERE id='$id'";
    }
    else{
        $query = "UPDATE categoryname SET categoryName = '$categoryName' WHERE id='$id'";

    }
    connect($query);
    header("location:../show-category.php");
?>