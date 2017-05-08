<?php

namespace Shop\Profil\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

use Shop\Profil\Model\ProfilEntity;
use Shop\Profil\Model\ProfilGateway;

class ProfilGatewayFactory
{
    private static $TAB_NAME = 'shop';
    
    public function __invoke($s_locator)
    {        
        $dbAdapter = $s_locator->get('Zend\Db\Adapter\Adapter');
        
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype(new ProfilEntity());
        
        $tableGateway = new TableGateway(self::$TAB_NAME, $dbAdapter, null, $resultPrototype);
        return new ProfilGateway($tableGateway);
    }
}
