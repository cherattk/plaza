<?php

namespace Shop\Profil\Service;

use Shop\Profil\Service\ProfilService;

class ProfilServiceFactory
{
    public function __invoke($s_locator)
    {
        $gateway = $s_locator->get('Shop\Profil\Model\ProfilGateway');
        
        return new ProfilService($gateway);
    }
}
