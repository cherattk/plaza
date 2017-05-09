<?php

namespace ShopTest;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ShopIndexControllerTest extends AbstractHttpControllerTestCase
{
    public static $testConfig;
    
    public static function setUpBeforeClass(){        
        
        self::$testConfig = include __DIR__ . '/config.test.php';
    }
    
    public function setUp() {
        
        $this->setApplicationConfig(self::$testConfig);

        $this->traceError = true;
    }

    
    public function testNotFoundAction()
    {        
        $this->dispatch('/not-found-path', 'GET');
        $this->assertResponseStatusCode(404);
        $this->assertTemplateName('layout/layout');
        $this->assertTemplateName('error/404');
    }
    
    public function testAjaxNotFoundResponse()
    {
        $this->dispatch('/not-found-path', 'GET' , [] , true /* isXmlHttpRequest = true */);
        $this->assertResponseStatusCode(404);
        $this->assertTemplateName('layout/json-not-found.html');
    }
    
    /**
     * @dataProvider dataForTestMethodNotAllowed()
     */
    public function testMethodNotAllowed($httpMethod)
    {
        $this->dispatch('/stock', $httpMethod);
        $this->assertResponseStatusCode(405);
    }
    
    /** Data Test **/
    public function dataForTestMethodNotAllowed()
    {
        return [
            ['PATCH'] , ['TRACE'] , ['OPTIONS'] , 
            ['CONNECT'] , ['HEAD'] , ['bad-method']
        ];
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
