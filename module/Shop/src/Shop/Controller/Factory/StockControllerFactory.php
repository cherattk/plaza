<?php

namespace Shop\Controller\Factory;

use Shop\Controller\StockController;

class StockControllerFactory
{
    public function __invoke($ctrl_manager)
    {
        $StockService = $ctrl_manager->getServiceLocator()->get('Shop\Service\StockService');
        
        return new StockController($StockService);
    }
}
