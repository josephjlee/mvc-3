<?php

namespace App\Controller;
use Core\Controller;
use App\Helper\FormHelper;
class HomeController extends Controller
{
    public function index(){

        $options = [
            1 => 'Vilnius',
            2 => 'Kaunas',
            3 => 'Siauliai',
            4 => 'Klaipeda',
        ];
        echo 'ok';
        $form = new FormHelper('account/create','post', 'registration');
        $form->addInput([
            'name' => 'name',
            'placeholder' => 'Name',
            'type' => 'text',
            'class' => 'input',
        ], 'Name', 'Class')
        ->addInput([
            'name' => 'age',
            'type' => 'range',
            'step' => '1',
            'min' => '1',
            'max' => '100',


        ])->addSelect($options, 'city')
        ->addTextarea([
            'class'=> 'textareaa'
        ], 'mano tekstas');

        echo $form->get();
    }
}