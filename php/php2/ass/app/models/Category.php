<?php

namespace App\Models;

class Category extends BaseModel
{
    protected $table = 'categorys';

    public function getCategory()
    {
        $sql = "select * from $this->table where status = 0";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addCategory($id, $categoryName, $status)
    {
        $sql = "insert into $this->table values(?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $categoryName, $status]);
    }
    public function getDetailCategory($id)
    {
        $sql = "select * from categorys where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateCategory($id, $categoryName)
    {
        $sql = "update $this->table set categoryName = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$categoryName, $id]);
    }
    public function deleteCategory($id)
    {
        $sql = "update $this->table set status = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
