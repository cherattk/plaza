<?php

namespace Shop\Profil;

use Shop\Profil\ProfilController;

class ProfilControllerFactory
{
    public function __invoke($ctrl_manager)
    {      
        $ProfilService = $ctrl_manager->getServiceLocator()
                                       ->get('Shop\Profil\Service\ProfilService');
        
        return new ProfilController($ProfilService);
    }
}
