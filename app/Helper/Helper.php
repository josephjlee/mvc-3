<?php

namespace App\Helper;

class Helper
{

    public function getController($path){
        $controller = strtolower($path); //mazasios raides post
        $controller = ucfirst($controller); //pirmoji didzioji Post
        $controller = '\App\Controller\\'.$controller.'Controller';

        return $controller;
    }


}