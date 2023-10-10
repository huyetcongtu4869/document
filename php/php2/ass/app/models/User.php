<?php

namespace App\Models;

class User extends BaseModel
{
    protected $table = 'users';


    public function getUser()
    {
        $sql = "select * from $this->table where status = 0";

        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getDetailUser($id)
    {
        $sql = "select * from users where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function addUser($id, $userName)
    {
        $sql = "insert into $this->table values(?,?,0)";
        $this->setQuery($sql);
        return $this->execute([$id, $userName]);
    }
    public function updateUser($id, $userName)
    {
        $sql = "update $this->table set userName = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$userName, $id]);
    }
    public function deleteUser($id)
    {
        $sql = "update $this->table set status = 1 where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
