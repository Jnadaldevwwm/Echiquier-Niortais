<?php

require_once '../views/view.php';
require_once '../Models/users.php';

class ControlerUsers{
    private $user;

    public function __construct(){
        $this->user = new Users;
    }

    public function pageLogin(){

        $view = new View('pageLogin');
        $view->render(array());
    }
    public function signUp($data){
        $password = htmlspecialchars($data['mdp']);
        $login = htmlspecialchars($data['login']);
        if($this->user->checkUser($login)=='0'){
            echo 'OSKOUR PAS DE USER';
        } else{
            echo'IL EXISTE!';
        }
        $view = new View('pageLogin');
        $view->render(array());
    }
}