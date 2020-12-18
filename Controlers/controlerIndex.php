<?php

require_once '../views/view.php';
require_once '../Models/articles.php';

class ControlerIndex{

    private $articles;

    public function __construct(){
        $this->articles = new Articles();
    }
    public function index(){
        $articles = $this->articles->getAllArticles();
        $view = new View('Index');
        $view->render(array('articles'=>$articles));
    }
}