<?php

require_once '../views/view.php';

class ControlerIndex{
    public function __construct(){

    }
    public function index(){
        $view = new View('Index');
        $view->render(array());
    }
}