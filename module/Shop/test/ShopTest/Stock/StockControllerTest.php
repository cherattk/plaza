<?php

namespace ShopTest\Stock;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

use Shop\Stock\StockController;

class StokControllerTest extends AbstractHttpControllerTestCase
{
    public static $config;
    
    public $mockStockService;
    
    public static function setUpBeforeClass()
    {        
        self::$config = include __DIR__ . '/../config.test.php';
    }
    
    public function setUp()
    {        
        $this->traceError = true;
        
        $this->setApplicationConfig(self::$config);        
        
        $this->mockStockService = $this->getMockBuilder('Shop\Stock\Service\StockService')
                                        ->disableOriginalConstructor()
                                        ->getMock();
        
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
            ['PATCH'] , ['TRACE'] , ['OPTIONS'] , ['CONNECT'] , ['HEAD']
        ];
    }
    
    /**
     * @dataProvider dataForTestIndexActionCalled()
     */
    public function testIndexActionCalled($httpMethod)
    {        
        $this->dispatch('/stock' , $httpMethod);
        $this->assertResponseStatusCode(200);
        $this->assertControllerName('Shop\Stock\Stock');
        $this->assertActionName('index');
    }
    
    public function dataForTestIndexActionCalled()
    {
        return [ ['GET'], ['POST'], ['PUT'], ['DELETE'] ];
    }
    
    
    public function getStockController()
    {
        $mockStockService = $this->mockStockService;
        
        $mockZendPluginParam = $this->getMockBuilder('Zend\Mvc\Controller\Plugin\Params')
                                    ->setMethods(['fromRoute'])
                                    ->getMock();
        
        $ctrl = new StockController($mockStockService);
        
        $ctrl->getPluginManager()->setService('params', $mockZendPluginParam);
        
        return $ctrl;
    }
    
    
    /**
     * 
     * @dataProvider dataForTestIndexActionResult()
     */
    public function testIndexActionResult($method)
    {
        $ctrl = $this->getStockController();
        
        $ctrl->getRequest()->setMethod($method);
        
        $result = $ctrl->indexAction();
        
        $this->assertInstanceOf('Zend\View\Model\JsonModel' , $result);
    }
    
    public function dataForTestIndexActionResult()
    {
        return [ ['GET'], ['POST'], ['PUT'], ['DELETE'] ];
    }
    
    /**
     * @dataProvider dataForTestProcessItem()
     */    
    public function testProcessItem($httpMethod)
    {
        $mockStockService = $this->mockStockService;
        
        $ctrl = new StockController($mockStockService);
        
        $result = $ctrl->processItem($id = 1 , $httpMethod);
        
        $this->assertTrue(is_array($result));
        
        $this->assertArrayHasKey('item' , $result);
    }
    
    public function dataForTestProcessItem()
    {
        return [
            'get item' => ['GET'] ,
            'update item' => ['PUT'] ,
            'delete item' => ['DELETE']
        ];
    }
}
