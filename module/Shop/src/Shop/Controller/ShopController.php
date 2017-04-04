<?php

namespace Shop\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\FileInput;

class ShopController extends AbstractActionController
{
    
    public function homeAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    
    public function stockAction()
    {        
        //$param = $this->params('slug');
    }
    
    public function imageAction()
    {
        
    }
}
