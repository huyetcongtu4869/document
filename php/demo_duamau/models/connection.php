<?php
//Kết nối đến CSDL
function connection()
{
    try {
        $conn = new PDO("mysql:host=localhost; dbname=demo; charset=utf8", "root", "");
        return $conn;
    } catch (PDOException $e) {
        echo "Lỗi kết nối dữ liệu: " . $e->getMessage();
    }
}
