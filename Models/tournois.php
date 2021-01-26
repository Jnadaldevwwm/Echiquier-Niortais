<?php
    require_once 'model.php';

    class Tournois extends Model{

        public function getTournois(){
            $sql = "SELECT * FROM tournois";
            $tournois = $this->goQuery($sql);
            $result = $tournois->fetchAll();
            $tournois->closeCursor();
            return $result;
        }

        public function addTournoi(){
            $sql = "INSERT INTO VALUES ()";
        }
    }