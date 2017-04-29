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
                        'controller' => 'Shop\Index',
                        'action'     => 'home',
                    ),                    
                ),
            ),
            'login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/login',
                    'defaults' => array(
                        'controller' => 'Shop\Index',
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
                        'controller' => 'Shop\Stock\Stock',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '\d{4}',
                    ),
                ),
            ),
            
            //--------------  API PROFIL --------------------//
            'profil' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/profil',
                    'defaults' => array(
                        'controller' => 'Shop\Profil\Profil',
                        'action' => 'index'
                    )
                ),
            ),
        ),
    ),
    'service_manager' => array(
        
        'factories' => array(
            'Shop\Profil\Service\ProfilService' 
                        => 'Shop\Profil\Service\ProfilServiceFactory',
            
            'Shop\Stock\Service\StockService' 
                        => 'Shop\Stock\Service\StockServiceFactory',
            
        )
    ),
    'controllers' => array(        
        'factories' => array(
            'Shop\Profil\Profil' => 'Shop\Profil\ProfilControllerFactory',

            'Shop\Stock\Stock' => 'Shop\Stock\StockControllerFactory', 
        ),        
        "invokables" => array(
            'Shop\Index' => 'Shop\IndexController'
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
            
            'layout/layout'         => __DIR__ . '/../view/layout/shop-base.phtml',            
            'shop/index/home'      => __DIR__ . '/../view/shop/backshop.html',
            'shop/index/login'      => __DIR__ . '/../view/shop/login.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        "strategies" => array(
            "ViewJsonStrategy"
        )
    )
);
