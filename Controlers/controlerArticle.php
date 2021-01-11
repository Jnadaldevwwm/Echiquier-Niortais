<?php

require_once '../Controlers/baseControler.php';
require_once '../views/view.php';
require_once '../Models/articles.php';

class ControlerArticle extends Controler{
    private $articles;

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
    public function createArticle(){
        $data = $_POST;
        $auteurArticle = $_SESSION['id'];
        $dateArticle = date("Y-m-d H:i:s");
        $titreArticle = $data['titreArticle'];
        $contenuArticle = $data['contentArticle'];
        $imageEntete = "l'image";
        $this->articles->addArticle($titreArticle,$dateArticle,$imageEntete,$contenuArticle,$auteurArticle);
    }
}