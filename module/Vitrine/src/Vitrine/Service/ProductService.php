<?php

namespace Vitrine\Service;

use Vitrine\ServiceInterface\ProductInterface;
use Vitrine\Model\Gateway\ProductGateway;

class ProductService implements ProductInterface
{    
    private $productGateway;
    
    public function __construct(ProductGateway $productGateway)
    {
        $this->productGateway = $productGateway;
    }
    
    public function getList($filter = 1 , $range = 10)
    {
        /*
         * return $this->productGateway->fetchProductList($filter , $range);
         */
        
        // DUMMY DATA //
        // PRODUCT LIST //
        $productId = "1234";
        $items = [];
        for ( $i = 1 ; $i < 9 ; $i++ ){
            $items[$i] = [];
            $items[$i]['name'] = "product name";
            $items[$i]['link'] = "/item/" . $productId;
            $items[$i]['price'] = 10.5;
            $items[$i]['img'] = "/prod-" . $i . ".jpg" ;
        }
        
        return $items;
    }
    
    public function getProduct($id)
    {        
        /*
         * return $this->productGateway->fetchProductById($id);
         */
        
        // DUMMY DATA //
        $item = [
            'id' => $id,
            'name' => 'product name',
            'price' => "12.5",
            'image' => [
                'prod-1.jpg' , 'prod-2.jpg','prod-3.jpg',
                'prod-4.jpg' , 'prod-5.jpg','prod-6.jpg',
            ],
            'description' => 'item description'
            
        ];
        
        return $item;
    }
}
