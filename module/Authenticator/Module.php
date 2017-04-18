<?php

namespace Authenticator;

use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        
        $sharedEventManager = $eventManager->getSharedManager();
            
        //*
        $sharedEventManager->attach('Zend\Mvc\Controller\AbstractController', 'dispatch', function($e){
            
            //$identity = $service->checkIdentity();
            $identity = false;            
            $controller = $e->getTarget();
            
            if(method_exists($controller, 'setIdentity') && is_callable(array($controller, 'setIdentity'))){
                $controller->setIdentity($identity);
            }
        },100);
        
        //*/
    }
}
