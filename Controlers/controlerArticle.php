<?php

require_once '../views/view.php';
require_once '../Models/articles.php';

class ControlerArticle{
    private $article;

    public function __construct(){
        $this->articles = new Articles();
    }

    public function pageArticle($idArticle){
        $article = $this->articles->getArticleById($idArticle);
        $view = new View('Article');
        $view->render(array('article'=>$article));
    }
}