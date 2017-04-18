<?php

namespace Visitor\Service\Factory;

use Visitor\Service\ShopService;

class ShopServiceFactory
{
    public function __invoke($s_locator)
    {
        $gateway = $s_locator->get('Visitor\Model\Gateway\ShopGateway');
        return new ShopService($gateway);
    }
}
