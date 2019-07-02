<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use \App\Helper\Helper;

if (isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];
} else {
    $path = '/';
}

$path = explode('/', $path);
//print_r($path);
$helper = new Helper();
if (isset($path[1]) && !empty($path[1])) {

    $controller = $helper->getController($path[1]);

    if (isset($path[2]) && !empty($path[2])) {
        $method = $path[2];

    } else {
        $method = 'index';
    }
    if (class_exists($controller)) {
        $object = new $controller;
        if (method_exists($object, $method)) {

            if(isset($path[3]) && !empty($path[3])){
                $object->{$method}($path[3]);
            }else {
                $object->{$method}();
            }

        } else {
            echo '405';
        }

    } else {
        echo '404';
    }


} else {
    $object = new \App\Controller\HomeController();
    $object->index();
}









