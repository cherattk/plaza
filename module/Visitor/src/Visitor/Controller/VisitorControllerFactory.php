<?php

namespace Visitor\Controller;

use Visitor\Controller\VisitorController;

class VisitorControllerFactory
{
    public function __invoke($ctrl_manager)
    {      
        $ShopService = $ctrl_manager->getServiceLocator()->get('Visitor\Service\ShopService');
        $ProductService = $ctrl_manager->getServiceLocator()->get('Visitor\Service\ProductService');
        
        return new VisitorController($ShopService , $ProductService);
    }
}
