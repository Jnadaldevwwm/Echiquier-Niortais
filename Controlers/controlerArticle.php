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
        if(!empty($_FILES['avatar']['name'])){
            define('WIDTH_MAX', 2000);    // Largeur max de l'image en pixels
            define('HEIGHT_MAX', 2000);    // Hauteur max de l'image en pixels
            require "../Controlers/scripts/uploadImage.php";
            $imageEntete = $nomImage;
        } else {
            $imageEntete = 'defaultPp.png';
        }
        
        $this->articles->addArticle($titreArticle,$dateArticle,$imageEntete,$contenuArticle,$auteurArticle);
    }
    public function deleteArticle($idArticle){
        $this->articles->removeArticle($idArticle);
        header('Location:?action=articlesManagement');
    }
}