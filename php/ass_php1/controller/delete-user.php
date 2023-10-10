<?php
    include "../model/connect.php";
    $id = $_GET["id"];
    $query = "DELETE FROM userlist WHERE id=$id";
    connect($query);

    header("location:../show-user.php");
?>