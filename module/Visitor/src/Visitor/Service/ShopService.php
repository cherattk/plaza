<?php

namespace Visitor\Service;

use Visitor\Service\ServiceInterface\ShopInterface;
use Visitor\Model\Gateway\ShopGateway;

class ShopService implements ShopInterface
{    
    private $imagePath = '/imagehost/shop';
            
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
            'id' => 'shop1234',
            'name' => 'My Shop',
            'link' => '/shop/1234',
            'banner' => '', // use default banner
            'logo' => '', // use default banner 
            'catalogue' => ['categorie-1' , 'categorie-2' , 'categorie-3'],
            
        ];
        
        return $shop;
    }
}
