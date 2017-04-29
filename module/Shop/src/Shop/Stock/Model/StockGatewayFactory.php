<?php

namespace Shop\Model\Factory;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

use Shop\Model\Entity\StockEntity;
use Shop\Model\Gateway\StockGateway;


class StockGatewayFactory
{
    private static $TAB_NAME = 'stock';
    
    public function __invoke($s_locator)
    {
        $dbAdapter = $s_locator->get('Zend\Db\Adapter\Adapter');
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype(new StockEntity());
        
        $tableGateway = new TableGateway(self::$TAB_NAME, $dbAdapter, null, $resultPrototype);
        return new StockGateway($tableGateway);
    }
}
