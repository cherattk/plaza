<?php

namespace Vitrine\Model\Factory;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

use Vitrine\Model\Entity\ProductEntity;
use Vitrine\Model\Gateway\ProductGateway;


class ProductGatewayFactory
{
    private static $TAB_NAME = 'product';
    
    public function __invoke($s_locator)
    {
        $dbAdapter = $s_locator->get('Zend\Db\Adapter\Adapter');
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype(new ProductEntity());
        
        $tableGateway = new TableGateway(self::$TAB_NAME, $dbAdapter, null, $resultPrototype);
        return new ProductGateway($tableGateway);
    }
}
