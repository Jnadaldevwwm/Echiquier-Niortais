<?php

require_once '../Controlers/baseControler.php';
require_once '../views/view.php';
require_once '../Models/articles.php';
require_once '../Controlers/scripts/dataImageConvert.php';
require_once '../Controlers/scripts/deleteImage.php';

class ControlerArticle extends Controler{
    private $articles;

    public function __construct(){
        $this->articles = new Articles();
    }

    public function pageArticle($idArticle){
        $article = $this->articles->getArticleById($idArticle);
        $view = new View('Article');
        $view->render(array('article'=>$article),array('motd'=>self::motd(),'topheader'=>self::topHeader()));
    }

    public function pageNewArticle(){
        if(isset($_SESSION['permission'])&&$_SESSION['permission']=='1'){
            $view = new View('pageNewArticle');
            $view->render(array(),array('motd'=>self::motd(),'topheader'=>self::topHeader()));
        } else {
            header('Location:?action=index');
        }
    }
    public function createArticle(){
        $data = $_POST;
        $auteurArticle = $_SESSION['id'];
        $dateArticle = date("Y-m-d H:i:s");
        $titreArticle = $data['titreArticle'];
        $contenuArticle = $data['contentArticle'];
        $contenuArticle = articleImageReplacer($contenuArticle);
        if(!empty($_FILES['avatar']['name'])){
            define('WIDTH_MAX', 2000);    // Largeur max de l'image en pixels
            define('HEIGHT_MAX', 2000);    // Hauteur max de l'image en pixels
            require "../Controlers/scripts/uploadImage.php";
            $imageEntete = $nomImage;
        } else {
            $imageEntete = 'defaultPp.png';
        }
        
        $this->articles->addArticle($titreArticle,$dateArticle,$imageEntete,$contenuArticle,$auteurArticle);
        header('Location:?action=articlesManagement');
    }
    public function editArticle($idArticle){
        $article = $this->articles->getArticleById($idArticle);

        $view = new View('editArticle');
        $view->render(array('article'=>$article),array('motd'=>self::motd(),'topheader'=>self::topHeader()));
    }
    public function edit(){
        $dataArticle = array('titre'=>$_POST['titreArticle'],'contenu'=>$_POST['contentArticle'],'id'=>$_GET['idArticle']);
        $this->articles->editArticle($dataArticle);
        header('Location:?action=articlesManagement');
    }
    public function deleteArticle($idArticle){
        $article = $this->articles->getArticleById($idArticle);
        imageRemover($article['contenu']);
        $this->articles->removeArticle($idArticle);
    }
    public function searchArticle(){

        if(isset($_POST['search']) && !empty($_POST['search'])){
            $keyWords = $_POST['search'];
            $articles = $this->articles->searchArticle($keyWords);
            $view = new View('resultatRecherche');
            $view->render(array('articles'=>$articles,'keyWords'=>$keyWords),array('motd'=>self::motd(),'topheader'=>self::topHeader()));
        } else {
            header('Location:?action=index');
        }
        
    }
}