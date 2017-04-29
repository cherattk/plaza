<?php

namespace Shop\Stock\Service;

use Shop\Stock\Service\StockService;

class StockServiceFactory
{
    public function __invoke($s_locator)
    {
        //$gateway = $s_locator->get('Shop\Model\Gateway\StockGateway');
        //return new StockService($gateway);        
        return new StockService();        
    }
}
