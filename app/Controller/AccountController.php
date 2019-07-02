<?php

namespace App\Controller;

use Core\Controller;

class AccountController extends Controller
{
    public function index()
    {
        echo 'ok';
    }

    public function registration()
    {
        $this->view->render('account/registration');
    }

    public function login()
    {
        $this->view->render('account/login');
    }

    public function create()
    {

        $user = new \App\Model\UsersModel();
        $user->setUsername($_POST['name']);
        $user->setEmail($_POST['email']);
        $pass = \App\Helper\InputHelper::passwordGenerator($_POST['password']);
        $user->setPassword($pass);
        $user->setActive(1);
        $user->setRoleId(1);
        $user->save();

    }

    public function auth(){
        $password = \App\Helper\InputHelper::passwordGenerator($_POST['password']);
        $email = $_POST['email'];

        $user = \App\Model\UsersModel::verification($email, $password);

        if(!empty($user)){
            //vyks dalykai prisiloginus;
            //redirectas i admina
        }else{
            //Neteisingas prisijungimas
            //redirectas atgal i logina.
        }

    }

}
