<?php

namespace ShopTest\Profil;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;


use Shop\Profil\ProfilController;

class ProfilControllerTest extends AbstractHttpControllerTestCase
{

    public function setUp() {
        $config = include __DIR__ . '/../config.test.php';

        $this->setApplicationConfig($config);

        $this->traceError = true;
        $this->mockProfilService = $this->getMockBuilder('Shop\Profil\Service\ProfilService')
                                        ->disableOriginalConstructor()
                                        ->getMock();

        parent::setUp();
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
       return [ 
            ['GET'],
            ['PUT']
        ];
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
    
    public function testGetProfilResult()
    {
        $this->assertTrue(is_array($response['user']) , 'user key content ' . gettype($response['user']));
        
        $this->assertArraySubSet(array(
            array(
            'key-1',
            'key-2',
            'key-3',
        )
        ) , array(
            'key-1' => '',
            'key-2' => '',
            'key-3' => '',
        ));
    }
    
    
    
    
}
