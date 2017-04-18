<?php

namespace Shop\Service\Factory;

use Shop\Service\ProfilService;

class ProfilServiceFactory
{
    public function __invoke($s_locator)
    {
        /*
        $gateway = $s_locator->get('Shop\Model\Gateway\StockGateway');
        return new StockService($gateway);
         * 
         */
        
        return new ProfilService();
    }
}