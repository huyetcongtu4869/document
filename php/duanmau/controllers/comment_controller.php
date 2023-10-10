<?php

function save_comment()
{
    extract($_POST);
    $data = [
        $idProduct,
        $content,
        $idUser
    ];
    var_dump($data);

    if ($idUser!="chưa đăng nhập" && $content != "") {
        comment_insert($data);
    }

    // comment_insert($data);
    header("location:" . $_SERVER['HTTP_REFERER']);
}
