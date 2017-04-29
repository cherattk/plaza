<?php

namespace ShopTest\Stock;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

use Shop\Stock\StockController;

class StokControllerTest extends AbstractHttpControllerTestCase
{    
    private $mockStockService;
    
    public function setUp()
    {        
        $config = include __DIR__ . '/../config.test.php';
        
        $this->setApplicationConfig($config);
        
        $this->traceError = true;
        $this->mockStockService = $this->getMockBuilder('Shop\Stock\Service\StockService')
                                    ->disableOriginalConstructor()
                                    ->getMock();
        
        parent::setUp();
    }
    
    
    /**
     * @dataProvider dataForTestMethodNotAllowed()
     */
    public function testMethodNotAllowed($httpMethod)
    {
        $this->dispatch('/stock', $httpMethod);
        $this->assertResponseStatusCode(405);
    }
    
    public function dataForTestMethodNotAllowed()
    {
        return [
            ['PATCH'] , ['TRACE'] , ['OPTIONS'] , ['CONNECT'] , ['HEAD']
        ];
    }
    
    /**
     * @dataProvider dataForTestIndexActionCalled()
     */
    public function testIndexActionCalled($httpMethod)
    {        
        $this->dispatch('/stock', $httpMethod);        
        $this->assertResponseStatusCode(200);
        $this->assertControllerName('Shop\Stock\Stock');
        $this->assertActionName('index');
        
    }
    
    public function dataForTestIndexActionCalled()
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
     * @dataProvider dataForTestProcessItem()
     */    
    public function testProcessItem($httpMethod)
    {
        $mockStockService = $this->mockStockService;
        
        $ctrl = new StockController($mockStockService);
        
        $result = $ctrl->processItem(1 , $httpMethod);
        
        $this->assertInstanceOf('Zend\View\Model\JsonModel' , $result);
    }
    
    public function dataForTestProcessItem()
    {
        return [
            'get item' => ['GET'] , 
            'create item' => ['POST'] , 
            'update item' => ['PUT'] ,
            'delete item' => ['DELETE']
        ];
    }
}
