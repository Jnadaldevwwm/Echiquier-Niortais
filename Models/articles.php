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
        public function countAllArticles(){
            $sql = 'SELECT COUNT(*) AS nb_articles FROM articles';
            $nbArticle = $this->goQuery($sql);
            $result = $nbArticle->fetch();
            $nbArticle->closeCursor();
            return $result['nb_articles'];
        }
        public function getArticlesPage($premierArt,$artParPage){
            $sql = "SELECT * FROM articles ORDER BY date DESC LIMIT :premier, :parpage";
            $result = $this->getDb()->prepare($sql);
            $result->bindParam(':premier',$premierArt, PDO::PARAM_INT);
            $result->bindParam(':parpage',$artParPage, PDO::PARAM_INT);
            $result->execute();
            $articles = $result->fetchAll();
            $result->closeCursor();
            return $articles;
        }

        public function addArticle($titre,$date,$image,$contenu,$auteur){
            $sql = "INSERT INTO articles VALUES(NULL,?,?,?,?,?)";
            $result = $this->goQuery($sql,array($titre,$date,$image,$contenu,$auteur));
        }

        public function removeArticle($idArticle){
            $sql = "DELETE FROM articles WHERE id=?";
            $result = $this->goQuery($sql, array($idArticle));
        }

        public function searchArticle($keyWords){
            $searchTerms = explode(' ', $keyWords); // on transforme chaine en tableau
            $searchTermBits = array();
            $searchTermBits2 = array();
            foreach ($searchTerms as $term) {   // pour chaque mot du tableau
                $term = trim($term);    // supprime les caractère invisible
                if (!empty($term)) {    
                    $searchTermBits[] = "titre LIKE '%$term%'"; // on ajoute dans un tableau autant de like que de mots différents
                    $searchTermBits2[] = "contenu LIKE '%$term%'";
                }
            }
            $sql = "SELECT * FROM articles WHERE ".implode(' AND ', $searchTermBits)." OR ".implode(' OR ', $searchTermBits2);    // on transforme notre tableau en chaine ou chaque élément sera séparé par une AND 

            $articles = $this->goQuery($sql);
            $result = $articles->fetchAll();
            $articles->closeCursor();
            return $result;
        }
    }