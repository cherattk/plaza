<?php

return array(
    'router' => array(
        'routes' => array(
            'test' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/test',
                    'defaults' => array(
                        'controller' => 'Visitor\Controller\Visitor',
                        'action'     => 'test',
                    ),
                ),
            ),
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Visitor\Controller\Visitor',
                        'action'     => 'welcome',
                    ),
                ),
            ),
            'shop' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/shop/:shopid',
                    'defaults' => array(
                        'controller' => 'Visitor\Controller\Visitor',
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
                    'route'    => '/product/:id',
                    'defaults' => array(
                        'controller' => 'Visitor\Controller\Visitor',
                        'action'        => 'product',
                    ),
                    'constraints' => array(
                        'id'     => '\d{4}',
                    )
                ),                
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Visitor\Controller\Visitor' 
                    => 'Visitor\Controller\VisitorControllerFactory'
        )        
    ),
    'service_manager' => array(
        
        ///////////////////////////////////////////////////////////
        'factories' => array(
            'Visitor\Service\ShopService'
                    => 'Visitor\Service\Factory\ShopServiceFactory',
                
            'Visitor\Model\Gateway\ShopGateway'
                    => 'Visitor\Model\Factory\ShopGatewayFactory',
            
            ///////////////////////////////////////////////////////////
            'Visitor\Service\ProductService'
                    => 'Visitor\Service\Factory\ProductServiceFactory',
                
            'Visitor\Model\Gateway\ProductGateway'
                    => 'Visitor\Model\Factory\ProductGatewayFactory',
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
            
            // managed by EdpModuleLayouts
            //'layout/layout'         => __DIR__ . '/../view/layout/visitor-base.phtml',
            'visitor/visitor/welcome'      => __DIR__ . '/../view/welcome.phtml',
            'visitor/visitor/shop'      => __DIR__ . '/../view/shop.phtml',
            'visitor/visitor/product'      => __DIR__ . '/../view/product.phtml',
            'visitor/visitor/dev'      => __DIR__ . '/../view/test/dev.phtml',
            
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )
    )
);
