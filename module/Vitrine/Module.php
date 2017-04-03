<?php
namespace Vitrine;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        $eventManager->attach(\Zend\Mvc\MvcEvent::EVENT_DISPATCH, array($this, 'authService'));  
    }

    public function authService(MvcEvent $e)
    {
        // $connected = $service->check();
        $connected = false;
        
        $layout = $e->getViewModel();
        
        if(!$connected){
            $login = new \Zend\View\Model\ViewModel();
            $login->setTemplate('login.phtml');        
            $layout->addChild($login, 'loginbox');
        }
        
        $layout->setVariable('isConnected', $connected);
        
        
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/vitrine.config.php';
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
