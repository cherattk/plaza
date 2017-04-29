<?php

namespace Shop\Stock\Service;

class StockService
{
    
    public function __construct() {}
    
    /**
     * 
     * @param string $id
     * @return array item's data
     */
    public function fetchItem($id)
    {
        $productId = "1234";
        $item = [
            "id" => $productId,
            "name" => "Short product Name",
            "description" => "Product description",
            "price" => 13.55,
            "price_promo" => 10,
            "quantity" => 10,
            "quantity_mini" => 10,
            "image" => [],
        ];
        
        for($i = 0 ; $i < 6 ; $i++){
            $item['image'][] = "/any/img/product-image.png";
        }
        
        return $item;
        
    }
    
    /**
     * 
     * @param string $filter
     * @param integer $range
     * @return array[] list of item
     */
    public function fetchList($filter = null, $range = 0) 
    {
        // DUMMY DATA: PRODUCT LIST //
        $productId = "1234";
        $stock = [];
        for ( $i = 1 ; $i < 9 ; $i++ ){
            $stock[$i] = [];
            $stock[$i]['id'] = $productId;
            $stock[$i]['name'] = "Short product name";
            $stock[$i]['price'] = 13.55;
            $stock[$i]['price_promo'] = 10.5;
            $stock[$i]['quantity'] = 10;
            $stock[$i]['quantity_mini'] = 5;
            $stock[$i]['image'] = '/any/img/product-image.png';
        }
        
        return $stock;
    }
    
    public function createItem()
    {
        $productId = "1234";
        $item = [
            "id" => $productId,
            "name" => "Short product Name",
            "description" => "Product description",
            "price" => 13.55,
            "price_promo" => 10,
            "quantity" => 10,
            "quantity_mini" => 10,
            "image" => [],
        ];
        
        for($i = 0 ; $i < 6 ; $i++){
            $item['image'][] = "/any/img/product-image.png";
        }
        
        return $item;
    }
    
    public function updateItem($id)
    {
        
    }
    
    public function deleteItem($id)
    {
        
    }
}
