<?php

namespace Shop\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class ProfilController extends AbstractActionController
{
    private $ProfilService;
    
    public function __construct($ProfilService) {
        $this->ProfilService = $ProfilService;
    }
    
    protected function ProfilService()
    {
        return $this->ProfilService;
    }
    
    public function indexAction()
    {
        return new JsonModel(['user' => 'user profil']);
    }
}
