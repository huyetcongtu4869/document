<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';

    public function getProduct()
    {
        $sql = "select * from $this->table where status =0";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addProduct($id, $productName, $price, $categoryId, $status)
    {
        $sql = "insert into $this->table values(?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $productName, $price, $categoryId, $status]);
    }
    public function getDetailProduct($id)
    {
        $sql = "select * from products where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateProduct($id, $productName, $price, $categoryId, $status)
    {
        $sql = "update $this->table set productName = ?,price = ?,categoryId=?,status=? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$productName, $price, $categoryId, $status, $id]);
    }
    public function deleteProduct($id)
    {
        $sql = "update $this->table set status=1 where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
