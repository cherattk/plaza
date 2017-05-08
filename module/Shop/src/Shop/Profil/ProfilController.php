<?php

namespace Shop\Profil;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class ProfilController extends AbstractActionController
{
    private $ProfilService;
    
    public function __construct($ProfilService) {
        $this->ProfilService = $ProfilService;
    }
    
    
    public function getProfilService()
    {
        return $this->ProfilService;
    }
    
    public function indexAction()
    {        
        $result = $this->getProfilService();
        
        return new JsonModel(['user' => '']);
    }    
    
}
