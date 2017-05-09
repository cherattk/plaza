<?php

namespace ShopTest\Profil;

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
    
    
    public function testGetProfil()
    {
        $this->dispatch('/profil', 'GET');        
        $this->assertResponseStatusCode(200);
        $this->assertControllerName('Shop\Profil\Profil');
        $this->assertActionName('index');
        
        $content = $this->getResponse()->getContent();
        
        $expectedResult = '{"profil" : ""}';
        
        $this->assertJsonStringEqualsJsonString($content , $expectedResult);
    }
    
    
}
