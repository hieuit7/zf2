<?php
// bootstrap.php
require_once "vendor/autoload.php";


use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("module\\Application\\src\\Application\\Entity");
$isDevMode = true;

// the connection configuration



$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '1234',
    'dbname'   => 'social',
    'host' => 'localhost',
    
);
//$redis = new Redis();
//$redis->connect('www.visualweber.net', 6379);
//
//$cacheDriver = new \Doctrine\Common\Cache\RedisCache();
//$cacheDriver->setRedis($redis);
$cacheDriver = new Doctrine\Common\Cache\ArrayCache();
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode,$paths,null,false);
//$config->setMetadataCacheImpl($cacheDriver);
$entityManager = EntityManager::create($dbParams, $config);

return ConsoleRunner::createHelperSet($entityManager);
?>