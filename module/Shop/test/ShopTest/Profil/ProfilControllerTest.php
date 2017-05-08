<?php

namespace ShopTest\Profil;

use Shop\Profil\ProfilController;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ProfilControllerTest extends AbstractHttpControllerTestCase
{
    public static $config;
    
    public static function setUpBeforeClass(){
        
        self::$config = include __DIR__ . '/../config.test.php';
    }
    
    public function setUp()
    {
        $this->traceError = true;
        
        $this->setApplicationConfig(self::$config);
        
        $this->mockProfilService = $this->getMockBuilder('Shop\Profil\Service\ProfilService')
                                        ->disableOriginalConstructor()
                                        ->getMock();

    }
    
    
    /**
     * @dataProvider dataForTestIndexAction()
     */
    public function testIndexAction($httpMethod)
    {
        $this->dispatch('/profil', $httpMethod);        
        $this->assertResponseStatusCode(200);
    }
    
    public function dataForTestIndexAction()
    {
       return [ ['GET'], ['PUT']  ];
    }
    
    
    public function testMethodNotAllowed()
    {
        $this->dispatch('/profil', 'PATCH');        
        $this->assertResponseStatusCode(405);
    }
    
    
    public function testIndexMethod()
    {
        $controller  = new ProfilController($this->mockProfilService);
        $result = $controller->indexAction();
        
        $this->assertInstanceOf('Zend\View\Model\JsonModel' , $result);
        
        $response = $result->getVariables();
        
        $this->assertTrue(is_array($response) , 'response is ' . gettype($response));
        
        $this->assertArrayHasKey('user' , $response);
        
    }
}
