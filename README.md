# Plaza
Ecommerce plateform based on ZF2 MVC layer and module systems.

## Usage with ZendSkeletonApplication for ZF2

1 - Make a fresh installation of 
    [ZendSkeletonApplication 2.4](https://github.com/zendframework/ZendSkeletonApplication/blob/release-2.4/README.md) 

2 - Dowload /plaza-dev/ and Copy the content of /plaza-dev/module/* and  /plaza-dev/public/* in /module/ and /public/ folders of the sketeleon

##### 3 - add to config/application.config.php

``` php 
    'modules' => array(
        'Visitor', // add this
        'Shop', // add this
    ),
```

##### 4 - add to config/autoload/global.php this config array

``` php
return array(
    'db' => array(
         'driver'         => 'Pdo',
         'dsn'            => 'mysql:dbname=dbname;host=localhost',
         'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
         ),
     ),
     'service_manager' => array(
         'factories' => array(
             'Zend\Db\Adapter\Adapter'
                     => 'Zend\Db\Adapter\AdapterServiceFactory',
         ),
     ),
    // used by EdpModuleLayouts module
    'module_layouts' => array(
        'Shop' => 'layout/shop-base',
        'Visitor' => 'layout/visitor-base',
    ),
);
```
##### Screenshot of Shop Page 
![Shop Page](/screenshot/plaza-shop.png?raw=true "Shop Page")

