<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';

    public function getProduct()
    {
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addProduct($id, $ten, $gia)
    {
        $sql = "insert into $this->table values(?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $ten, $gia]);
    }
    public function getDetailProduct($id)
    {
        $sql = "select * from products where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateProduct($id, $ten, $gia)
    {
        $sql = "update $this->table set productName = ?,price = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$ten,$gia,$id]);
    }
}
