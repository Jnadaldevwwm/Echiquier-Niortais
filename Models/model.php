<?php

abstract class Model {

    protected $db;

    protected function goQuery($sql, $params = null){
        if($params == null){
            $result = $this->getDb()->query($sql);
        } else {
            $result = $this->getDb()->prepare($sql);
            $result->execute($params);
        }
        return $result;
    }

    protected function getDb(){
        if($this->db == null){
            $this->db = new PDO('mysql:host=localhost;dbname=echiquier_niortais;charset=utf8', 'root2', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->db;
    }
}