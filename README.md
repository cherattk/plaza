# Plaza
Ecommerce plateform based on ZF2 MVC layer and module systems.

## Usage with ZendSkeletonApplication for ZF2

1 - Make a fresh installation of 
    [ZendSkeletonApplication 2.4](https://github.com/zendframework/ZendSkeletonApplication/blob/release-2.4/README.md) 

2 - A) - Dowload /plaza-dev/ and Copy the content of /plaza-dev/module/* and  /plaza-dev/public/* in /module/ and /public/ folders of the skeleton

##### 3 - add to config/application.config.php

``` php 
    'modules' => array(
        'Visitor', // add this default module
    ),
```
#### 4 - add to public/index.php

```
// require 'init_autoloader.php'

/*************************************************************
* Code to add
* this will attach appropriate module depending on subdomain
* ex :
* www.hostname.com to access Default Module Vitrine
* shop.hostname.com will load Shop Module
*************************************************************/

$AppConfig = require 'config/application.config.php';
$subdomain = explode('.' , $_SERVER['HTTP_HOST']);

// Setup module by subdomaine
$moduleBySubDomain = [
    // 'subdomain' => 'module name'
    "shop" => 'Shop'
];

if(count($subdomain) === 3 && isset($moduleBySubDomain[$subdomain[0]])){    
    // change default module
    $AppConfig['modules'][0] = $moduleBySubDomain[$subdomain[0]];
}

// Run the application!
// Replace `Zend\Mvc\Application::init(require 'config/application.config.php')->run();`
// By this
Zend\Mvc\Application::init($AppConfig)->run();


```
##### 5 - add to config/autoload/global.php this config array

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
    // Config EdpModuleLayouts module
    'module_layouts' => array(
        'Shop' => 'layout/shop-base',
        'Visitor' => 'layout/visitor-base',
    ),
);
```
##### Screenshot of Shop Page 
![Shop Page](/screenshot/plaza-shop.png?raw=true "Shop Page")

