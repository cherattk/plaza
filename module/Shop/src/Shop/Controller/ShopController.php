<?php

namespace Shop\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Shop\Service\ProfilService;
use Shop\Service\StockService;

class ShopController extends AbstractActionController
{
    private $StockService;
    
    private $ProfilService;
    
    private $identity = null;
    
    public function __construct(
            ProfilService $ProfilService ,
            StockService $StockService
            )
    {
        $this->ProfilService = $ProfilService;
        $this->StockService = $StockService;
    }
    
    
    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        parent::onDispatch($e);
    }
    
    public function setIdentity($identity)
    {
        $this->identity = $identity; 
        
    }
    
    public function StockService()
    {
        return $this->StockService;
    }
    
    public function ProfilService()
    {
        return $this->ProfilService;
    }
    
    public function homeAction()
    {
        $view = new ViewModel();
        //$view->setTerminal(true);
        return $view;
    }
    
    public function loginAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    
    public function profilAction()
    {
        // without accept header
        return new JsonModel(array(
            'contact' => $this->ProfilService()->getProfil()
        ));
    }
    
    public function stocklistAction()
    {
        $response = new JsonModel([
            "list" => $this->StockService()->getList()
        ]);
        return $response;
    }
    
    public function itemAction()
    {
        return new JsonModel(array(
            'item' => $this->StockService()->getItem()
        ));
    }
    
}
