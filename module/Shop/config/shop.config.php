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
                    'route'    => '/stock[/:slug]',
                    'defaults' => array(
                        'controller' => 'Shop\Controller\Shop',
                        'action'        => 'stock',
                    ),
                    'constraints' => array(
                        'slug'     => '\d{4}',
                    )
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
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Shop\Controller\Shop' => 'Shop\Controller\ShopController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'shop/shop/home'      => __DIR__ . '/../view/shop/backshop.html',
            //'layout/layout'         => __DIR__ . '/../view/shop/base.phtml',
            'error/404'             => __DIR__ . '/../view/error/404.phtml',
            'error/index'           => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy'
        )
    )
);
