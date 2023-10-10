<?php
//function lấy toàn bộ dữ liệu bảng loai
function category_all()
{
    $conn = connection();
    $sql = "SELECT * FROM categorys";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
//Function insert hàng hóa
function category_insert($data = [])
{
    $conn = connection();
    $sql = "INSERT INTO categorys(categoryName) VALUES(?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

//Function update hàng hóa
function category_update($data = [])
{
    $conn = connection();
    $sql = "Update categorys SET categoryName=? WHERE categoryId=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

//Function delete hàng hóa
function category_delete($id)
{
    $conn = connection();
    $sql = "
    UPDATE products SET categoryId = 22 where categoryId=$id;
    DELETE FROM categorys WHERE categoryId=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
}

//function Lấy 1 bản ghi
function category_one($id)
{
    $conn = connection();
    $sql = "SELECT * FROM categorys WHERE categoryId=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function conn_shearch_category($keyword)
{
    $conn = connection();
    $sql = "SELECT * FROM categorys where categoryName like '%$$keyword%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function count_category($query)
{
    $conn = connection();
    $sql = "SELECT count(*) as 'countCategory' FROM products where categoryId=$query";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
