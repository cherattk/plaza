<?php

namespace Shop\Profil\Service;

use Shop\Profil\Service\ProfilService;

class ProfilServiceFactory
{
    public function __invoke($s_locator)
    {
        $gateway = $s_locator->get('Shop\Model\Profil\ProfilGateway');
        
        return new ProfilService($gateway);
    }
}
