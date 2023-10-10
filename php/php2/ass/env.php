<?php
//điều chỉnh kết nối db ở đây
const DBNAME = "php2";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";
const BASE_URL = "http://localhost/php2/ass/";
function route($nameRoute)
{
    return BASE_URL . $nameRoute;
}
function redirect($key, $msg, $route)
{
    $_SESSION[$key] = $msg;
    switch ($key) {
        case 'success':
            unset($_SESSION['errors']);
            break;
        case 'errors':
            unset($_SESSION['success']);
            break;
    }
    header('location:' . BASE_URL . $route . "?msg=" . $key);
    die;
}
