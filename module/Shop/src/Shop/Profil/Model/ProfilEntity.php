<?php

namespace Shop\Profil\Model;


class ProfilEntity
{
    public $id; 
    public $name;
    
    public function exchangeArray($data)
    {
        $this->id   = (!empty($data['boutique_id'])) ? $data['boutique_id'] : null;
        $this->name = (!empty($data['boutique_nom'])) ? $data['boutique_nom'] : null;
    }
}
