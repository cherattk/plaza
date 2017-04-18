<?php

return array(
    'router' => array(
        'routes' => array(
            'userspace' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/userspace',
                    'defaults' => array(
                        'controller' => 'Client\Controller\Client',
                        'action'     => 'home',
                    ),                    
                ),
            ),
            'purchase' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/purchase[/:slug]',
                    'defaults' => array(
                        'controller' => 'Client\Controller\Client',
                        'action'        => 'purchase',
                    ),
                    'constraints' => array(
                        'slug'     => '\d{4}',
                    )
                ),                
            ),
            'userimage' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/client/image',
                    'verb' => 'post',
                    'defaults' => array(
                        'controller' => 'Client\Controller\Client',
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
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Client\Controller\Client' => 'Client\Controller\ClientController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'client/client/home'      => __DIR__ . '/../view/clientspace.html',
            //'layout/layout'         => __DIR__ . '/../view/shop/base.phtml',
            'error/404'             => __DIR__ . '/../view/error/404.phtml',
            'error/index'           => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )
    )
);


