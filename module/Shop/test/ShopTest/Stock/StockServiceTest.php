<?php

namespace ShopTest\Stock;

use Shop\Stock\Service\StockService;

class StockServiceTest extends \PHPUnit\Framework\TestCase
{    
    private $mockGateway;

    public static $testConfig;
    
    public static function setUpBeforeClass()
    {        
        self::$testConfig = include __DIR__ . '/../config.test.php';
    }
    
    public function setUp() {
        
        $this->traceError = true;

        $this->mockGateway = $this->getMockBuilder('Shop\Stock\Model\StockGateway')
                                         ->disableOriginalConstructor()
                                         ->getMock();
    }

    public function testSelectItem()
    {        
        

    }

}
