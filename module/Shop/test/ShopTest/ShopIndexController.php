<?php

namespace ShopTest;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ShopIndexController extends AbstractHttpControllerTestCase {

    public function setUp() {
        $config = include __DIR__ . '/config.test.php';

        $this->setApplicationConfig($config);

        $this->traceError = true;
//        $this->mockStockService = $this->getMockBuilder('Dependency')
//                ->disableOriginalConstructor()
//                ->getMock();

        parent::setUp();
    }

    public function testIndexAction() {
        $this->dispatch('/', 'GET');
        $this->assertResponseStatusCode(200);
    }

}
