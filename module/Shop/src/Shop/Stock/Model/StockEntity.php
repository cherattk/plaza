<?php

namespace Shop\Stock\Model;

class StockEntity
{
    public $product_id;
    public $quantity;
    public $quantity_minimum;

    public function exchangeArray($data)
    {        
        $this->product_id   = (!empty($data['product_id'])) ? $data['product_id'] : null;
        $this->quantity = (!empty($data['quantity'])) ? $data['quantity'] : null;
        $this->quantity_minimum = (!empty($data['quantity_minimum'])) ? $data['quantity_minimum'] : null;
    }
}
