<?php

namespace ShopTest\Stock;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

//use Shop\Stock\StockController;

class StokControllerTest extends AbstractHttpControllerTestCase
{
    public static $testConfig;
    
    public $mockStockService;
    
    public static function setUpBeforeClass()
    {        
        self::$testConfig = include __DIR__ . '/../config.test.php';
    }
    
    public function setUp()
    {        
        $this->traceError = true;
        
        $this->setApplicationConfig(self::$testConfig);        
        
        $this->mockStockService = $this->getMockBuilder('Shop\Stock\Service\StockService')
                                        ->disableOriginalConstructor()
                                        ->setMethods([
                                            'select',
                                            'selectList',
                                            'insert',
                                            'update',
                                            'delete'
                                        ])
                                        ->getMock();
        
        
        
        
    }
    
    public function setMockService()
    {
        $serviceManager = $this->getApplicationServiceLocator();
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('Shop\Stock\Service\StockService', 
                                    $this->mockStockService);
    }
    
    public function testCreateItem()
    {
        $this->mockStockService->expects($this->once())
                                ->method('insert')
                                ->willReturn('item-data');
        
        $this->setMockService();
        
        $this->dispatch('/stock' , 'POST');
        $this->assertResponseStatusCode(200);
        $this->assertControllerName('Shop\Stock\Stock');
        $this->assertActionName('index');
        
        $content = $this->getResponse()->getContent();
        
        $expectedResult = '{"item" : "item-data"}';
        
        $this->assertJsonStringEqualsJsonString($content , $expectedResult);
        
    }
    
    public function testGetListItem()
    {
        $this->mockStockService->expects($this->once())
                                ->method('selectList')
                                ->willReturn('item-data');
        
        $this->setMockService();
        
        $this->dispatch('/stock' , 'GET');
        //$this->dispatch('/stock?filter=param' , 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertControllerName('Shop\Stock\Stock');
        $this->assertActionName('index');
        
        $content = $this->getResponse()->getContent();
        
        $expectedResult = '{"list" : "item-data"}';
        
        $this->assertJsonStringEqualsJsonString($content , $expectedResult);
        
    }
    
    public function testGetItem()
    {
        $this->mockStockService->expects($this->once())
                                ->method('select')
                                ->willReturn('item-data');
        
        $this->setMockService();
        
        $this->dispatch('/stock/1234' , 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertControllerName('Shop\Stock\Stock');
        $this->assertActionName('index');
        
        $content = $this->getResponse()->getContent();
        
        $expectedResult = '{"item" : "item-data"}';
        
        $this->assertJsonStringEqualsJsonString($content , $expectedResult);
        
    }
    
    public function testUpdateItem()
    {
        $this->mockStockService->expects($this->once())
                                ->method('update')
                                ->willReturn('updated-data');
        
        $this->setMockService();
        
        $this->dispatch('/stock/1234' , 'PUT');
        $this->assertResponseStatusCode(200);
        $this->assertControllerName('Shop\Stock\Stock');
        $this->assertActionName('index');
        
        $content = $this->getResponse()->getContent();
        
        $expectedResult = '{"item" : "updated-data"}';
        
        $this->assertJsonStringEqualsJsonString($content , $expectedResult);
        
    }
    
    public function testDeleteItem()
    {
        $itemId = "1234";
        
        $this->mockStockService->expects($this->once())
                                ->method('delete')
                                ->with($this->equalTo($itemId))
                                //->willReturn('deleted-item-id');
                                ->will($this->returnArgument(0));
        
        $this->setMockService();
        
        $this->dispatch('/stock/' . $itemId , 'DELETE');
        $this->assertResponseStatusCode(200);
        $this->assertControllerName('Shop\Stock\Stock');
        $this->assertActionName('index');
        
        $content = $this->getResponse()->getContent();
        
        $expectedResult = '{"message" : "deleted-item" , "id" : "'. $itemId .'"}';
        
        $this->assertJsonStringEqualsJsonString($content , $expectedResult);
        
    }
    
}
