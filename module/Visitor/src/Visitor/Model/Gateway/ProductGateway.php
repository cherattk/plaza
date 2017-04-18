<?php

namespace Visitor\Model\Gateway;

use Zend\Db\TableGateway\TableGateway;

class ProductGateway
{
    private $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchProductList($filter , $range)
    {
        /*
        $resultSet = $this->tableGateway->select();
        return $resultSet;
        */
        
    }
    
    public function fetchProductById($id)
    {        
        /*
        
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
        
        */    
    }
}
