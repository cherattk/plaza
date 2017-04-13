<?php

return array(
    'router' => array(
        'routes' => array(
            'backshop' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/backshop',
                    'defaults' => array(
                        'controller' => 'Shop\Controller\Shop',
                        'action'     => 'home',
                    ),                    
                ),
            ),
            'stock' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/stock[/:range]',
                    'defaults' => array(
                        'controller' => 'Shop\Controller\Shop',
                        'action'        => 'stocklist',
                    ),
                    'constraints' => array(
                        'range' => '\d{1}',
                    ),
                ),
            ),
            'shopimage' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/backshop/image',
                    'verb' => 'post',
                    'defaults' => array(
                        'controller' => 'Shop\Controller\Shop',
                        'action'        => 'image',
                    )
                ),                
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'Shop\Service\StockService'
                    => 'Shop\Service\Factory\StockServiceFactory',
            
            'Shop\Model\Gateway\StockGateway'
                    => 'Shop\Model\Factory\StockGatewayFactory',
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Shop\Controller\Shop' => 'Shop\Controller\ShopControllerFactory'
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
            
            'layout/layout'         => __DIR__ . '/../view/layout/layout.phtml',            
            'shop/shop/home'      => __DIR__ . '/../view/shop/backshop.html',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        )
    )
);
