<?php
//function lấy toàn bộ dữ liệu bảng hang_hoa
function hang_hoa_all()
{
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//Function insert hàng hóa
function hang_hoa_insert($data = [])
{
    $conn = connection();
    $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, mo_ta) VALUES(?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

//Function update hàng hóa
function hang_hoa_update($data = [])
{
    $conn = connection();
    $sql = "Update hang_hoa SET ten_hh=?, don_gia=?, giam_gia=?, hinh=?, ma_loai=?, mo_ta=? WHERE ma_hh=?";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

//Function delete hàng hóa
function hang_hoa_delete($ma_hh)
{
    $conn = connection();
    $sql = "DELETE FROM hang_hoa WHERE ma_hh=?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$ma_hh]);
}

//function Lấy 1 bản ghi
function hang_hoa_one($ma_hh)
{
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$ma_hh]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
