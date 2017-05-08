<?php

namespace ShopTest;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ShopIndexControllerTest extends AbstractHttpControllerTestCase
{
    public static $config;
    
    public static function setUpBeforeClass(){        
        
        self::$config = include __DIR__ . '/config.test.php';
    }
    
    public function setUp() {
        
        $this->setApplicationConfig(self::$config);

        $this->traceError = true;
    }

    
    public function testNotFoundAction() {
        
        $this->dispatch('/machin', 'GET');
        $this->assertResponseStatusCode(404);
        $this->assertTemplateName('layout/layout');
        $this->assertTemplateName('error/404');
    }
    
    public function testHomeAction() {
        
        $this->dispatch('/', 'GET');
        $this->assertResponseStatusCode(200);        
        $this->assertActionName('home');        
        $this->assertTemplateName('layout/layout');
        $this->assertTemplateName('shop/index/home');
    }
    
    public function testLoginAction() {
        
        $this->dispatch('/login', 'GET');
        $this->assertResponseStatusCode(200);        
        $this->assertActionName('login');
        $this->assertNotTemplateName('layout/layout');
        $this->assertTemplateName('shop/index/login');
    }

}
