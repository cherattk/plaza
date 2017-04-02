<?php

namespace Vitrine\Model\Gateway;

use Zend\Db\TableGateway\TableGateway;

class ShopGateway
{
    private $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchShopById($id)
    {        
        /*
         * 
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
         *       
        */       
    }
}
