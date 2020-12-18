<?php
    require_once 'model.php';

    class Articles extends Model{

        public function getAllArticles(){
            $sql = "SELECT * FROM articles";
            $articles = $this->goQuery($sql);
            $result = $articles->fetchAll();
            $articles->closeCursor();
            return $result;
        }
        public function getArticleById($idArticle){
            $sql = "SELECT * FROM articles WHERE id =?";
            $article = $this->goQuery($sql, array($idArticle));
            $result = $article->fetch();
            $article->closeCursor();
            return $result;
        }
    }