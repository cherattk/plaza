<?php

namespace ShopTest\Profil;

use Shop\Profil\Model\ProfilEntity;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

use Zend\Test\PHPUnit\Controller\AbstractControllerTestCase;

class ProfilGatewayTest extends AbstractControllerTestCase
{
    public static $config;
    
    public static function setUpBeforeClass(){        
        
        self::$config = include __DIR__ . '/../config.test.php';
    }
    
    public function setUp()
    {
        $this->traceError = true;
        
        $this->setApplicationConfig(self::$config);
    }
    
    public function testFetchProfil()
    {
        /*
        $s_locator = $this->getApplicationServiceLocator();
        $dbAdapter = $s_locator->get('Zend\Db\Adapter\Adapter');
        
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype(new ProfilEntity());
        
        $tableGateway = new TableGateway('shop', $dbAdapter, null, $resultPrototype);
        
        $gateway = new ProfilGateway($tableGateway);
        
        $result = $gateway->fetchProfil(1);
        
        $this->assertInstanceOf('Zend\Db\ResultSet\ResultSet' , $result);
        
        $result->rewind();
        
        $this->assertEquals(1 ,  $result->count());
        
        $this->assertEquals(0 ,  $result->key());
        
        $this->assertInstanceOf('Shop\Profil\Model\ProfilEntity' , $result->current());
        */
        
    }
}
