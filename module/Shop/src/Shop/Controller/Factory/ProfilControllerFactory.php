<?php

namespace Shop\Controller\Factory;

use Shop\Controller\ProfilController;

class ProfilControllerFactory
{
    public function __invoke($ctrl_manager)
    {      
        $ProfilService = $ctrl_manager->getServiceLocator()->get('Shop\Service\ProfilService');
        
        return new ProfilController($ProfilService);
    }
}
