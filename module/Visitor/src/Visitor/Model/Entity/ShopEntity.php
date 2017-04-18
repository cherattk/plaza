<?php

namespace Visitor\Model\Entity;

class ShopEntity
{    
    public $id;
    public $name;

    public function exchangeArray($data)
    {        
        $this->id   = (!empty($data['shop_id'])) ? $data['shop_id'] : null;
        $this->name = (!empty($data['shop_name'])) ? $data['shop_name'] : null;
    }
}
