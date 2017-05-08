<?php

namespace Shop\Stock\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

use Shop\Stock\Model\StockEntity;
use Shop\Stock\Model\StockGateway;

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
