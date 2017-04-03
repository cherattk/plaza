<?php

namespace Vitrine\Service;

use Vitrine\ServiceInterface\ProductInterface;
use Vitrine\Model\Gateway\ProductGateway;

class ProductService implements ProductInterface
{    
    private $imagePath = '/imagehost/item';
    
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
            $items[$i]['name'] = "Short product name";
            $items[$i]['link'] = "/item/" . $productId;
            $items[$i]['price'] = 10.5;
            $items[$i]['img'] = '/any/img/product-image.png';
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
            'image' => [],
            'description' => 'item description'
            
        ];
        
        for ($i = 1 ; $i < 7 ; $i++){
            
            $item['image'][] = '/any/img/product-image.png';
        }
        return $item;
    }
}
