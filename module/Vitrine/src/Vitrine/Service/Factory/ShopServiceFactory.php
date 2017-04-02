<?php

namespace Vitrine\Service\Factory;

use Vitrine\Service\ShopService;

class ShopServiceFactory
{
    public function __invoke($s_locator)
    {
        $gateway = $s_locator->get('Vitrine\Model\Gateway\ShopGateway');
        return new ShopService($gateway);
    }
}
