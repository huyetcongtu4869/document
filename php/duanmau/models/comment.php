<?php
function comment_insert($data = [])
{
    $conn = connection();
    $sql = "INSERT INTO comment(idProduct,content,idUser,date) VALUES(?,?,?,now())";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function comment_one($id)
{
    $conn = connection();
    $sql = "SELECT * FROM comment WHERE idProduct=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
