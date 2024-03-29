<?php


namespace App\Helper;

class FormHelper
{
    public function __construct($action, $method, $class = '')
    {
        $this->html = '<form class="' . $class . '" action="' . $action . '" method="' . $method . '">';
    }

    public function addInput($attributes, $label = '', $wrapper = '')
    {
        //implementuoti Label
        $html = '';
        $html .= '<input ';

        foreach ($attributes as $key => $element) {
            $html .= ' ' . $key . '="' . $element . '"';
        }

        $html .= ' >';
        if ($wrapper != '') {
            $html = '<div class="' . $wrapper . '">' . $html . '</div>';
        }
        $this->html .= $html;
        return $this;
    }

    public function addSelect($options, $name, $wrapper = '', $label = '')
    {
        $html = '';
        $html .= '<select name="' . $name . '">';
        foreach ($options as $value => $option) {
            $html .= '<option value="' . $value . '"';
            $html .= ' >';
            $html .= ucfirst($option);
            $html .= '</option>';
        }
        $html .= '</select>';
        if ($wrapper != '') {
            $html = '<div class="' . $wrapper . '">' . $html . '</div>';
        }
        $this->html .= $html;
        return $this;
    }

    public function addTextarea($attributes, $value = '', $label = "", $wrapper = "")
    {
        $html = '';

        if ($label != '') {
            if (isset($attributes['id'])) {
                $for = 'for="' . $attributes['id'] . '"';
            } else {
                $for = "";
            }

            $html .= '<label ' . $for . '>' . $label . '</label>';
        }

        $html .= '<textarea ';

        foreach ($attributes as $key => $element) {
            $html .= ' ' . $key . '="' . $element . '"';
        }
        $html .= ' >';
        $html .= $value;
        $html .= '</textarea>';

        if ($wrapper != '') {
            $html = '<div class="' . $wrapper . '">' . $html . '</div>';
        }


        $this->html .= $html;
        return $this;
    }


    public function get()
    {
        $this->html .= '</form>';
        return $this->html;
    }
}