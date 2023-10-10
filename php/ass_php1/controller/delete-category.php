<?php
    include "../model/connect.php";
    $id = $_GET["id"];
    $query = "UPDATE products SET categoryId = 2 where categoryId=$id";
    connect($query);
    $query2="DELETE FROM categoryname WHERE id=$id";
    connect($query2);
    header("location:../show-category.php");
?>