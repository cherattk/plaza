<?php

namespace Vitrine\Controller;

use Vitrine\Controller\VitrineController;

class VitrineControllerFactory
{
    public function __invoke($ctrl_manager)
    {      
        $ShopService = $ctrl_manager->getServiceLocator()->get('Vitrine\Service\ShopService');
        $ProductService = $ctrl_manager->getServiceLocator()->get('Vitrine\Service\ProductService');
        
        return new VitrineController($ShopService , $ProductService);
    }
}
