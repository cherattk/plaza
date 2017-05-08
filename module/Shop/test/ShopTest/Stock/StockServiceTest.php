<?php

namespace ShopTest\Stock;

use Shop\Stock\Service\StockService;

class StockServiceTest extends \PHPUnit\Framework\TestCase
{

    private $mockServiceGateway;

    public function setUp() {
        $this->traceError = true;

        $this->mockServiceGateway = $this->getMockBuilder('Shop\Stock\Model\StockGateway')
                ->disableOriginalConstructor()
                ->getMock();
    }

    public function testFetchItem() {
        
        $service = new StockService($this->mockServiceGateway);

        $result = $service->fetchItem(1);

        $this->assertTrue(is_array($result));

        $this->assertCount(8, $result);

        //$this->assertArrayHasKey("key", $result);
    }

}
