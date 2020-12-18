<?php
    require_once 'model.php';

    class Articles extends Model{

        public function getAllArticles(){
            $sql = "SELECT * FROM articles";
            $articles = $this->goQuery($sql);
            return $articles;
        }
    }