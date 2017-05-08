<?php

namespace Shop\Profil\Model;

use Zend\Db\TableGateway\TableGateway;

class ProfilGateway 
{
    private $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        
        $this->tableGateway = $tableGateway;
        
    }
    
    public function fetchProfil($shopId)
    {
        return $this->tableGateway->select(array('boutique_id' => 'Shop-A'));
    }
}
