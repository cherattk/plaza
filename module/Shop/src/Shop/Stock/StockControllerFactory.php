<?php

namespace Shop\Stock;

use Shop\Stock\StockController;

class StockControllerFactory
{
    public function __invoke($ctrl_manager)
    {
        $StockService = $ctrl_manager->getServiceLocator()
                                    ->get('Shop\Stock\Service\StockService');
        
        return new StockController($StockService);
    }
}
