<?php
require_once "models/product.php";
function listProduct()
{
    $products = getProduct();
    var_dump($products);
    include_once "views/products.php";
}
function addProduct()
{
    return "Đây là trang thêm sản phẩm";
}
