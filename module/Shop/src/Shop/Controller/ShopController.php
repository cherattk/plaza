<?php

namespace Shop\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Shop\Service\StockService;

class ShopController extends AbstractActionController
{
    private $StockService;
    
    public function __construct(
            StockService $StockService
            )
    {
            $this->StockService = $StockService;
    }
    
    public function onDispatch(\Zend\Mvc\MvcEvent $e) 
    {
        $connected = true;
        
        if(!$connected && 'shoplogin' !== $e->getRouteMatch()->getMatchedRouteName()){
            $this->redirect()->toRoute('shoplogin');
        }
        return parent::onDispatch($e);
    }
    
    public function StockService()
    {
        return $this->StockService;
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
    
    public function stocklistAction()
    {
        // without accept header
        $jsonData = new JsonModel(array(
            'list' => $this->StockService()->getList()
        ));
        
        return $jsonData;
    }
    
}
