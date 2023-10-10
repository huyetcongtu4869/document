<?php
    // echo $_POST["productImage"];
    // echo "<pre>";
    // var_dump($_FILES);
    // var_dump($_POST);die;
    include "../model/connect.php";
    $productName = $_POST["productName"]; 
    $productImage = $_FILES["productImage"]["name"];
    $productPrice = $_POST["productPrice"]; 
    $productDesc = $_POST["productDesc"];
    $category = $_POST["category"];
    $id = $_POST["productId"];
    $query = "";
    if ($productImage!="") {
        $query = "UPDATE products SET productName = '$productName', productImage = './image/img-products/$productImage', productPrice = $productPrice, productDesc = '$productDesc', categoryId = $category WHERE id='$id'";  
      }
      else {
        $query = "UPDATE products SET productName = '$productName', productPrice = $productPrice, productDesc = '$productDesc', categoryId = $category WHERE id='$id'";
      }
    connect($query);
    header("location:../admin.php");
?>