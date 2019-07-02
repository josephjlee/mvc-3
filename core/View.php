<?php

namespace Core;

class View
{

    public $posts;

    public function render($template){

        $path = __DIR__;
        $path = str_replace('core','', $path);
        include $path.'views/page/header.php';
        include $path.'views/'.$template.'.php';
        include $path.'views/page/footer.php';
        //var/www/html/php2/mvc/views/page/header.php

    }
}