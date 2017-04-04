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
            'name' => 'super product name',
            'price' => 12.5,
            'image' => [],
            'description' => 'Lorem ipsum dolor sit amet, '
                        . 'consectetur adipiscing elit. Vivamus porttitor,'
                        . ' metus ac suscipit luctus, sem justo venenatis leo,'
                        . ' sit amet porttitor nulla ipsum non ex. Cras'
                        . ' pharetra scelerisque venenatis. '
                        . 'Fusce a lectus et ex dapibus molestie'
                        . ' vel vel erat. Integer laoreet eros molestie,'
                        . ' maximus arcu in, placerat ligula. Aliquam erat '
                        . 'volutpat. Aliquam enim ex, porta quis nunc rhoncus, '
                        . 'suscipit posuere lacus. Aenean in malesuada justo'
            
        ];
        
        for ($i = 1 ; $i < 7 ; $i++){
            
            $item['image'][] = '/any/img/product-image.png';
        }
        return $item;
    }
}
