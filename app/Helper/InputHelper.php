<?php


namespace App\Helper;

class InputHelper
{
    public static function passwordGenerator($pass){
        return md5(md5($pass.'salt'));
    }
}