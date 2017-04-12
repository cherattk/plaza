<?php

namespace Client\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\FileInput;

class ClientController extends AbstractActionController
{
    
    public function homeAction()
    {
        $view  = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
}
