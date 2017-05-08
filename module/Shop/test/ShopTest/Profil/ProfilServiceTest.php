<?php

namespace ShopTest\Profil;

use Shop\Profil\Service\ProfilService;

class ProfilServiceTest extends \PHPUnit\Framework\TestCase
{    
    public static $config;
    
    public $mockProfilGateway;
    
    public static function setUpBeforeClass(){        
        
        self::$config = include __DIR__ . '/../config.test.php';
    }
    
    
    public function setUp()
    {
        $this->traceError = true;
        
        $this->mockProfilGateway = $this->getMockBuilder('Shop\Profil\Model\ProfilGateway')
                                        ->disableOriginalConstructor()
                                        ->getMock();
    }
    
    public function testGetProfil()
    {
        $service = new ProfilService($this->mockProfilGateway);
        
        $result = $service->getProfil(1);
        
        $this->assertTrue(is_array($result));
        
        $this->assertCount(5 , $result);
        
        $this->assertArrayHasKey("address",$result);
        $this->assertArrayHasKey("city",$result);
        $this->assertArrayHasKey("zipcode",$result);
        $this->assertArrayHasKey("phone",$result);
        $this->assertArrayHasKey("email",$result);
        
    }
}
