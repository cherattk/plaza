<?php
namespace Shop;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        $eventManager->attach(MvcEvent::EVENT_DISPATCH , function($e){
            
            $allowedMethod = ['GET' , 'POST' , 'PUT' , 'DELETE'];
        
            $requestMethod = $e->getRequest()->getMethod();

            if(!in_array($requestMethod, $allowedMethod)){

                $response = $e->getResponse();
                $response->setStatusCode(405);
                $response->setContent('Method Not Allowed');
                return $response;
            }        
        });
        
        $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, function($e){
            
            if($e->getRequest()->isXmlHttpRequest()){               
                $e->getViewModel()->setTemplate('layout/json-not-found.html');
            }
            
        }, 10);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/shop.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
