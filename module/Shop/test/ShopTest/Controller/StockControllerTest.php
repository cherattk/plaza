<?php

namespace ShopTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

use Shop\Controller\StockController;

class StokControllerTest extends AbstractHttpControllerTestCase
{    
    private $mockStockService;
    
    public function setUp()
    {        
        $config = include __DIR__ . '/../config.test.php';
        
        $this->setApplicationConfig($config);
        
        $this->traceError = true;
        $this->mockStockService = $this->getMockBuilder('Shop\Service\StockService')
                                    ->disableOriginalConstructor()
                                    ->getMock();
        
        parent::setUp();
    }
    
    
    /**
     * @dataProvider dataTestMethodNotAllowed()
     */
    public function testMethodNotAllowed($method)
    {
        $this->dispatch('/stock', $method);
        $this->assertResponseStatusCode(405);
    }
    
    public function dataTestMethodNotAllowed()
    {
        return [
            ['PATCH'] , ['TRACE'] , ['OPTIONS'] , ['CONNECT'] , ['HEAD']
        ];
    }
    
    /**
     * @dataProvider dataTestIndexActionCalled()
     */
    public function testIndexActionCalled($method)
    {        
        $this->dispatch('/stock', $method);        
        $this->assertResponseStatusCode(200);
        $this->assertControllerName('Shop\Controller\Stock');
        $this->assertActionName('index');
        
    }
    
    public function dataTestIndexActionCalled()
    {
        return [ 
            ['GET'], ['POST'], ['PUT'], ['DELETE']
        ];
    }
    
    
    
    public function testIndexActionReturnZendJsonModel()
    {        
        $mockStockService = $this->mockStockService;
        
        $zendPluginParamsMock = $this->getMockBuilder('Zend\Mvc\Controller\Plugin\Params')
                    ->setMethods(['fromRoute'])
                    ->getMock();
        
        $ctrl = new StockController($mockStockService);
        
        $ctrl->getPluginManager()->setService('params', $zendPluginParamsMock);
        
        $result = $ctrl->indexAction();
        
        $this->assertInstanceOf('Zend\View\Model\JsonModel' , $result);
    }
    
    
    
    /**
     * @dataProvider dataTestProcessItem()
     */    
    public function testProcessItem($method)
    {
        $mockStockService = $this->mockStockService;
        
        $ctrl = new StockController($mockStockService);
        
        $result = $ctrl->processItem(1 , $method);
        
        $this->assertInstanceOf('Zend\View\Model\JsonModel' , $result);
    }
    
    public function dataTestProcessItem()
    {
        return [
            'get item' => ['GET'] , 
            'create item' => ['POST'] , 
            'update item' => ['PUT'] ,
            'delete item' => ['DELETE']
        ];
    }
}
