<?php

require_once '../Controlers/baseControler.php';
require_once '../views/view.php';
require_once '../Models/articles.php';

class ControlerIndex extends Controler{

    private $articles;

    public function __construct(){
        $this->articles = new Articles();
    }
    public function index(){
        $articles = $this->articles->getAllArticles();
        $motd = self::sidebar();
        $view = new View('Index');
        $view->render(array('articles'=>$articles),array('motd'=>$motd));
    }
    public function test(){
        $data = $_POST;
        $motd = self::sidebar();
        $view = new View('Test');
        $view->render(array('data'=>$data),array('motd'=>$motd));
    }
}