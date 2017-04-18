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
            'profil' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/shop/profil',
                    'defaults' => array(
                        'controller' => 'Shop\Controller\Shop',
                        'action'     => 'profil',
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
            'item' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/stock/item/:id',
                    'defaults' => array(
                        'controller' => 'Shop\Controller\Shop',
                        'action' => 'item'
                    ),
                    'constraints' => array(
                        'id' => '\d{4}',
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
            'shoplogin' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/backshop/login',
                    'defaults' => array(
                        'controller' => 'Shop\Controller\Shop',
                        'action'        => 'login',
                    )
                )
            )
        ),
    ),
    'service_manager' => array(
        
        'factories' => array(
            'Shop\Service\ProfilService'
                    => 'Shop\Service\Factory\ProfilServiceFactory',
            
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
            
            // managed by EdpModuleLayouts
            'layout/layout'         => __DIR__ . '/../view/layout/shop-base.phtml',
            
            'shop/shop/home'      => __DIR__ . '/../view/shop/backshop.html',
            'shop/shop/login'      => __DIR__ . '/../view/shop/login.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        "strategies" => array(
            "ViewJsonStrategy"
        )
    )
);
