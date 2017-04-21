<?php

/**
namespace Shop\Controller\Factory;

use Shop\Controller\ShopController;

class ShopControllerFactory
{
    public function __invoke($ctrl_manager)
    {   
        
        $ProfilService = $ctrl_manager->getServiceLocator()->get('Shop\Service\ProfilService');
        $StockService = $ctrl_manager->getServiceLocator()->get('Shop\Service\StockService');        
        return new ShopController($ProfilService , $StockService);
        
    }
}
 * 
 */
