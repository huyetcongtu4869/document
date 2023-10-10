<?php
require_once 'models/db.php';
function getProduct()
{
    $sql="select *from products";
    return getData($sql);
}