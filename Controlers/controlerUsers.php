<?php

require_once '../views/view.php';
require_once '../Models/users.php';

class ControlerUsers{

    public function __construct(){
        
    }
    public function signIn(){
        
        $view = new View('signIn');
        $view->render(array());
    }
}