<?php


namespace App\Helper;

class FormHelper
{
    public function __construct($action, $method, $class = '')
    {
        $this->html = '<form class="'.$class.'" action="'.$action.'" method="'.$method.'">';
    }

    public function addInput($attributes, $label = '', $wrapper = '')
    {
        $this->html .= '<input ';

        foreach ($attributes as $key => $element){
            $this->html .= ' '.$key.'="'.$element.'"';
        }

        $this->html .= ' >';
        return $this;
    }

    public function get()
    {
        $this->html .= '</form>';
        return $this->html;
    }
}