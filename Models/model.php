<?php

abstract class Model {

    protected $db;

// goQuery : méthode custom qui execute une requete prise en paramètre avec possibilté d'ajouter un array contenant des paramètres pour la requete.
    protected function goQuery($sql, $params = null){
        if($params == null){
            $result = $this->getDb()->query($sql);
        } else {
            $result = $this->getDb()->prepare($sql);
            $result->execute($params);
        }
        return $result;
    }

// getDb : méthode de connection à la base de donnée qui retourne l'objet PDO de connection.
    protected function getDb(){
        if($this->db == null){
            $this->db = new PDO('mysql:host=localhost;dbname=echiquier_niortais;charset=utf8', 'root2', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->db;
    }
}