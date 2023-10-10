<?php
//function lấy toàn bộ dữ liệu bảng hang_hoa
function hang_hoa_all()
{
    $conn = connection();
    $sql = "SELECT * FROM products";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//Function insert hàng hóa
function product_insert($data = [])
{
    $conn = connection();
    $sql = "INSERT INTO products(productName, productImage, productPrice, productDesc, categoryId,date) VALUES(?, ?, ?, ?, ?,now())";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

//Function update hàng hóa
function hang_hoa_update($data = [])
{
    $conn = connection();
    $sql = "Update products SET productName=?, productImage=?, productPrice=?, productDesc=?, categoryId=? WHERE Id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

//Function delete hàng hóa
function hang_hoa_delete($id)
{
    $conn = connection();
    $sql = "DELETE FROM products WHERE Id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
}
function comment_delete($id)
{
    $conn = connection();
    $sql = "DELETE FROM comment WHERE Id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
}

//function Lấy 1 bản ghi
function product_one($id)
{
    $conn = connection();
    $sql = "SELECT * FROM products WHERE Id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function product_category($id)
{
    $conn = connection();
    $sql = "SELECT * FROM products WHERE categoryId=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function shearch($query)
{
    $conn = connection();
    $sql = "SELECT * FROM products where productName like '%$query%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function count_view($id, $view)
{
    $conn = connection();
    $sql = "Update products SET view=$view WHERE Id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function top10()
{
    $conn = connection();
    $sql = "SELECT * FROM products ORDER BY VIEW DESC LIMIT 0,6";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
