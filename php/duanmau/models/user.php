<?php
//function lấy toàn bộ dữ liệu bảng user
function user_all()
{
    $conn = connection();
    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//Function insert hàng hóa
function user_insert($data = [])
{
    $conn = connection();
    $sql = "INSERT INTO users(userName, avartar, password,level) VALUES(?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

//Function update hàng hóa
function user_update($data = [])
{
    $conn = connection();
    $sql = "Update users SET userName=?, avartar=?, password=?,level=? WHERE Id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

//Function delete hàng hóa
function user_delete($id)
{
    $conn = connection();
    $sql = "DELETE FROM users WHERE Id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
}

//function Lấy 1 bản ghi
function user_one($id)
{
    $conn = connection();
    $sql = "SELECT * FROM users WHERE Id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function conn_shearch_user($query)
{
    $keyword = $query;
    $conn = connection();
    $sql = "SELECT * FROM users where userName like '%$keyword%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
