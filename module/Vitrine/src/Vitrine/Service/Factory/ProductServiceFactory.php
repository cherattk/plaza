<?php

namespace Vitrine\Service\Factory;

use Vitrine\Service\ProductService;

class ProductServiceFactory
{
    public function __invoke($s_locator)
    {
        $gateway = $s_locator->get('Vitrine\Model\Gateway\ProductGateway');
        return new ProductService($gateway);        
    }
}
