<?php

namespace Shop\Service;

use Shop\Service\ServiceInterface\StockInterface;

class StockService implements StockInterface
{
    
    public function getList($filter = null, $range = 0) 
    {
        // DUMMY DATA //
        // PRODUCT LIST //
        $productId = "1234";
        $stock = [];
        for ( $i = 1 ; $i < 9 ; $i++ ){
            $stock[$i] = [];
            $stock[$i]['id'] = $productId;
            $stock[$i]['name'] = "Short product name";
            $stock[$i]['price'] = 13.55;
            $stock[$i]['pricepromo'] = 10.5;
            $stock[$i]['qte'] = 10;
            $stock[$i]['qtemini'] = 5;
            $stock[$i]['image'] = '/any/img/product-image.png';
        }
        
        return $stock;
    }
}
