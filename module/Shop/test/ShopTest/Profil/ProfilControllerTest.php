<?php

namespace ShopTest\Profil;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ProfilControllerTest extends AbstractHttpControllerTestCase {

    public function setUp() {
        $config = include __DIR__ . '/../config.test.php';

        $this->setApplicationConfig($config);

        $this->traceError = true;
//        $this->mockStockService = $this->getMockBuilder('Dependency')
//                                        ->disableOriginalConstructor()
//                                        ->getMock();

        parent::setUp();
    }
    
    
    /**
     * @dataProvider dataForTestIndexAction()
     */
    public function testIndexAction($httpMethod)
    {
        $this->dispatch('/profil', $httpMethod);        
        $this->assertResponseStatusCode(200);
    }
    
    public function dataForTestIndexAction()
    {
       return [ 
            ['GET'], ['PUT']
        ];
    }
    

}
