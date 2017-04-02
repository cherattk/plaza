<?php

namespace Vitrine\Service;

use Vitrine\ServiceInterface\ShopInterface;
use Vitrine\Model\Gateway\ShopGateway;

class ShopService implements ShopInterface
{    
    private $shopGateway;
    
    public function __construct(ShopGateway $shopGateway)
    {
        $this->shopGateway = $shopGateway;
    }
    
    public function getShop($id)
    {        
        //$shop = $this->shopGateway->fetchShopById($id);
        
        $id  = 'Shop-' . $id;
        $shop = [
            'name' => 'My Shop',
            'link' => '/shop/1234',
            'banner' => 'bois-banner.jpg',
            'logo' => 'logo-2.jpg',
            'catalogue' => ['categorie-1' , 'categorie-2' , 'categorie-3'],
            
        ];
        
        return $shop;
    }
}
