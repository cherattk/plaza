<?php

return array(
    'router' => array(
        'routes' => array(
            'test' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/test',
                    'defaults' => array(
                        'controller' => 'Vitrine\Controller\Vitrine',
                        'action'     => 'test',
                    ),
                ),
            ),
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Vitrine\Controller\Vitrine',
                        'action'     => 'welcome',
                    ),
                ),
            ),
            'vitrine' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/shop/:shopid',
                    'defaults' => array(
                        'controller' => 'Vitrine\Controller\Vitrine',
                        'action'        => 'shop',
                    ),
                    'constraints' => array(
                        'shopid'     => '\d{4}',
                    )
                ),                
            ),
            'product' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/item/:itemid',
                    'defaults' => array(
                        'controller' => 'Vitrine\Controller\Vitrine',
                        'action'        => 'product',
                    ),
                    'constraints' => array(
                        'itemid'     => '\d{4}',
                    )
                ),                
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Vitrine\Controller\Vitrine' 
                    => 'Vitrine\Controller\VitrineControllerFactory'
        )        
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        ///////////////////////////////////////////////////////////
        'factories' => array(
            'Vitrine\Service\ShopService'
                    => 'Vitrine\Service\Factory\ShopServiceFactory',
                
            'Vitrine\Model\Gateway\ShopGateway'
                    => 'Vitrine\Model\Factory\ShopGatewayFactory',
            
            ///////////////////////////////////////////////////////////
            'Vitrine\Service\ProductService'
                    => 'Vitrine\Service\Factory\ProductServiceFactory',
                
            'Vitrine\Model\Gateway\ProductGateway'
                    => 'Vitrine\Model\Factory\ProductGatewayFactory',
        ),
             
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'error/404'             => __DIR__ . '/../view/error/404.phtml',
            'error/index'           => __DIR__ . '/../view/error/index.phtml',
            
            'layout/layout'         => __DIR__ . '/../view/layout/base.phtml',
            'vitrine/vitrine/welcome'      => __DIR__ . '/../view/welcome.phtml',
            'vitrine/vitrine/shop'      => __DIR__ . '/../view/shop.phtml',
            'vitrine/vitrine/product'      => __DIR__ . '/../view/product.phtml',
            'vitrine/vitrine/test'      => __DIR__ . '/../view/test/test.phtml',
            
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),        
    )
);
