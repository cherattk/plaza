<?php

namespace Shop\Profil\Service;

class ProfilService
{
    public function getProfil()
    {
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
