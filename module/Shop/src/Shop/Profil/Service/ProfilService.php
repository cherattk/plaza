<?php

namespace Shop\Profil\Service;

class ProfilService
{
    private $profilGateway;
    
    public function __construct($profilGateway) {
        $this->profilGateway = $profilGateway;
    }
    
    public function shopIdentifier($public_id)
    {
        $id = $public_id;
        return $id;
    }
    
    public function getProfil($id)
    {
        $id = $this->shopIdentifier($id);
        
        $this->profilGateway->fetchProfil($id);
                
        $contact = [
            "address" => "123 rue machin" ,
            "city" => "Montreal" ,
            "zipcode" => "H1M 4K4" ,
            "phone" => "1234567890" ,
            "email" => "shop@mail.com" ,
        ];
        return $contact;
    }
}
