<?php
    require_once 'model.php';

    class Articles extends Model{

        // Methode qui return tout les articles.
        public function getAllArticles(){
            $sql = "SELECT a.id as 'id', a.titre as 'titre', a.date as 'date', a.image as 'image', a.contenu as 'contenu', u.prenom as 'auteur' FROM articles a INNER JOIN users u ON a.auteur = u.id ORDER BY date DESC";
            $articles = $this->goQuery($sql);
            $result = $articles->fetchAll();
            $articles->closeCursor();
            return $result;
        }
        // Methode qui return un article on fonction de son id.
        public function getArticleById($idArticle){
            $sql = "SELECT * FROM articles WHERE id =?";
            $article = $this->goQuery($sql, array($idArticle));
            $result = $article->fetch();
            $article->closeCursor();
            return $result;
        }

        public function deleteArticle($idArticle){
            
        }
    }