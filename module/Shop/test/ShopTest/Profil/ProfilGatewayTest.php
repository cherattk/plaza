<?php

namespace ShopTest\Profil;

use Shop\Profil\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

use Zend\Test\PHPUnit\Controller\AbstractControllerTestCase;

class ProfilGatewayTest extends AbstractControllerTestCase
{
    
    public function setUp()
    {
        $this->traceError = true;
        
        $config = include __DIR__ . '/../config.test.php';
        
        $this->setApplicationConfig($config);
    }
    
    public function testFetchProfil()
    {
        $s_locator = $this->getApplicationServiceLocator();
        $dbAdapter = $s_locator->get('Zend\Db\Adapter\Adapter');
        
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype(new Model\ProfilEntity());
        
        $tableGateway = new TableGateway('shop', $dbAdapter, null, $resultPrototype);
        
        $gateway = new Model\ProfilGateway($tableGateway);
        
        $result = $gateway->fetchProfil(1);
        
        $this->assertInstanceOf('Zend\Db\ResultSet\ResultSet' , $result);
        
        $result->rewind();
        
        $this->assertEquals(1 ,  $result->count());
        
        $this->assertEquals(0 ,  $result->key());
        
        $this->assertInstanceOf('Shop\Profil\Model\ProfilEntity' , $result->current());
        
        
    }
}
