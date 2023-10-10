<?php

namespace App\Models;

class Sale extends BaseModel
{
    protected $table = 'sales';

    public function getSale()
    {
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addSale($id, $name, $idService, $status)
    {
        $sql = "insert into $this->table values(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name, $idService, $status]);
    }
    public function getDetailSale($id)
    {
        $sql = "select * from sales where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateSale($id, $name, $serviceId = "demo", $status)
    {
        $sql = "update $this->table set name = ?,serviceId=?,status=? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $serviceId, $status, $id]);
    }
    public function updateService($id, $serviceName)
    {
        $sql = "update $this->table set serviceName = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$serviceName, $id]);
    }
    public function deleteSale($id)
    {
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
