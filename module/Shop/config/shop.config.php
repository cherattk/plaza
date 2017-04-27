<?php

return array(
    'router' => array(
        'routes' => array(
            
            // --------------- User Interface --------------//
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Shop\Controller\Shop',
                        'action'     => 'home',
                    ),                    
                ),
            ),
            'login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/login',
                    'defaults' => array(
                        'controller' => 'Shop\Controller\Shop',
                        'action'        => 'login',
                    )
                )
            ),
            //------------------ API Stock  ---------------------//
            'stock' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/stock[/:id]',
                    'defaults' => array(
                        'controller' => 'Shop\Controller\Stock',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '\d{4}',
                    ),
                ),
            ),
            
            //--------------  API PROFIL --------------------//
//            'profil' => array(
//                'type' => 'Segment',
//                'options' => array(
//                    'route'    => '/profil',
//                    'defaults' => array(
//                        'controller' => 'Shop\Controller\Profil',
//                        'action' => 'index'
//                    )
//                ),
//            ),
//            'profilimage' => array(
//                'type'    => 'Literal',
//                'options' => array(
//                    'route'    => '/profil/image',
//                    'verb' => 'post',
//                    'defaults' => array(
//                        'controller' => 'Shop\Controller\Profil',
//                        //'action'        => 'image',
//                    )
//                ),                
//            ),
            
            
            
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
            'Shop\Controller\Profil'
                        => 'Shop\Controller\Factory\ProfilControllerFactory',

            'Shop\Controller\Stock' 
                        => 'Shop\Controller\Factory\StockControllerFactory', 
        ),
        
        "invokables" => array(
            'Shop\Controller\Shop' => 'Shop\Controller\ShopController'
        )
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
