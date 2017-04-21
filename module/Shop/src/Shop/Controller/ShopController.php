<?php

namespace Shop\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ShopController extends AbstractActionController
{    
    private $identity = null;
    
    public function __construct(){}
    
    
    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        parent::onDispatch($e);
    }
    
    public function setIdentity($identity)
    {
        $this->identity = $identity; 
        
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
    
    
    
}
