<?php

require_once __DIR__.'/src/Symfony/Component/ClassLoader/UniversalClassLoader.php';
 
use Symfony\Component\ClassLoader\UniversalClassLoader;
 
$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony'          => array(__DIR__.'/src', __DIR__.'/symfony/src'),
    'Osidays'          => __DIR__.'/src/',
));

$loader->register();