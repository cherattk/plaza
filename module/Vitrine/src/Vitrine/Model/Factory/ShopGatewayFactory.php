<?php

namespace Vitrine\Model\Factory;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

use Vitrine\Model\Entity\ShopEntity;
use Vitrine\Model\Gateway\ShopGateway;


class ShopGatewayFactory
{
    private static $TAB_NAME = 'boutique';
    
    public function __invoke($s_locator)
    {
        $dbAdapter = $s_locator->get('Zend\Db\Adapter\Adapter');
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype(new ShopEntity());
        
        $tableGateway = new TableGateway(self::TAB_NAME, $dbAdapter, null, $resultPrototype);
        return new ShopGateway($tableGateway);
    }
}
