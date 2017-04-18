<?php

namespace Visitor\Service\Factory;

use Visitor\Service\ProductService;

class ProductServiceFactory
{
    public function __invoke($s_locator)
    {
        $gateway = $s_locator->get('Visitor\Model\Gateway\ProductGateway');
        return new ProductService($gateway);        
    }
}
