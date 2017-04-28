<?php

use Zend\Loader\AutoloaderFactory;
use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceManager;

error_reporting(E_ALL | E_STRICT);

/**
 * Test bootstrap, for setting up autoloading
 */
class Bootstrap
{
    public static function initApplication()
    {
        static::initAutoloader();
        
        $config = array(
            'module_listener_options' => array(
                'module_paths' => array(
                    './module',
                    './vendor',
                ),
                'config_glob_paths' => array(
                    'config/autoload/{,*.}{global,local}.php',
                ),
            ),
            'modules' => array()
        );
        
        $serviceManager = new ServiceManager(new ServiceManagerConfig($config));
        $serviceManager->setService('ApplicationConfig', $config);
        $serviceManager->get('ModuleManager')->loadModules();
        
    }    

    protected static function initAutoloader()
    {
        $zf2Path  = __DIR__ . "/vendor/ZF2/library";
        include $zf2Path . '/Zend/Loader/AutoloaderFactory.php';
        
        if (!class_exists('Zend\Loader\AutoloaderFactory')) {
            throw new RuntimeException(
                'Unable to load ZF2. Zend\Loader\AutoloaderFactory doesn\'t exists'                 
            );
        }
        
        AutoloaderFactory::factory(array(
            'Zend\Loader\StandardAutoloader' => array(
                'autoregister_zf' => true,
                'namespaces' => array(
                   'Shop' =>  __DIR__ . '/module/Shop/src/Shop',
                ),
            ),
        ));
    }
}

Bootstrap::initApplication();