<?php

namespace Shop;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
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
        return new ViewModel();
    }
    
    public function loginAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    
    
    
}
