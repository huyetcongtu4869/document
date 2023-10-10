<?php

namespace App\Models;

class Service extends BaseModel
{
    protected $table = 'services';

    public function getService()
    {
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addService($id, $serviceName)
    {
        $sql = "insert into $this->table values(?,?,0)";
        $this->setQuery($sql);
        return $this->execute([$id, $serviceName]);
    }
    public function getDetailService($id)
    {
        $sql = "select * from services where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateService($id, $serviceName)
    {
        $sql = "update $this->table set serviceName = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$serviceName, $id]);
    }
    // public function deleteService($id) {
    //     $sql = "update $this->table set status = 1 where id = ?";
    //     $this->setQuery($sql);
    //     return $this->execute([$id]);
    // }
}
