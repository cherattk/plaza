<?php

namespace Shop\Controller;

class ShopControllerFactory
{
    public function __invoke($ctrl_manager)
    {      
        $StockService = $ctrl_manager->getServiceLocator()->get('Shop\Service\StockService');
        
        return new ShopController($StockService);
    }
}
