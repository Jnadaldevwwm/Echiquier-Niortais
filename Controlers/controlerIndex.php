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
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        }
        $nbArticles = (int)$this->articles->countAllArticles();
        $parPage = 5;
        $nbPages = ceil($nbArticles/$parPage);
        $premier = ($currentPage * $parPage) - $parPage;
        $articles = $this->articles->getArticlesPage($premier,$parPage);

        $pagination = array('currentPage'=>$currentPage,'pages'=>$nbPages);

        $view = new View('Index');
        $view->render(array('articles'=>$articles,'pagination'=>$pagination),array('motd'=>self::motd()));
    }
    public function test(){
        $data = $_POST;
        $view = new View('Test');
        $view->render(array('data'=>$data),array('motd'=>self::motd()));
    }
}