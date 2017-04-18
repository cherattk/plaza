<?php

namespace Visitor\Model\Entity;

class ProductEntity
{    
    public $id;
    public $name;

    public function exchangeArray($data)
    {        
        $this->id   = (!empty($data['prod_id'])) ? $data['prod_id'] : null;
        $this->name = (!empty($data['prod_name'])) ? $data['prod_name'] : null;
    }
}
