# Plaza
Ecommerce plateform based on ZF2 MVC layer and module systems.
## Usage with Zend Skeleton Application for ZF2 : 
##### config/autoload/global.php must return this config array

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
);
```
