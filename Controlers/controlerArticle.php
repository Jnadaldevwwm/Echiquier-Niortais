<?php

require_once '../Controlers/baseControler.php';
require_once '../views/view.php';
require_once '../Models/articles.php';

class ControlerArticle extends Controler{
    private $article;

    public function __construct(){
        $this->articles = new Articles();
    }

    public function pageArticle($idArticle){
        $article = $this->articles->getArticleById($idArticle);
        $view = new View('Article');
        $motd = self::sidebar();
        $view->render(array('article'=>$article),array('motd'=>$motd));
    }

    public function pageNewArticle(){
        $view = new View('pageNewArticle');
        $motd = self::sidebar();
        $view->render(array(),array('motd'=>$motd));
    }
    public function createArticle($data){
        
    }
}