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
        public function getTournoisDate($date){
            $sql = "SELECT * FROM tournois WHERE date_debut = ?";
            $tournois = $this->goQuery($sql,array($date));
            $result = $tournois->fetchAll();
            $tournois->closeCursor();
            return $result;
        }

        public function addTournoi($dataTournoi){
            $sql = "INSERT INTO tournois VALUES (NULL,?,?,?,?,?,?)";
            $result = $this->goQuery($sql, array($dataTournoi['dateDebutTournoi'],$dataTournoi['dateFinTournoi'],$dataTournoi['nomTournoi'],$dataTournoi['typeTournoi'],$dataTournoi['nbPlaces'],$dataTournoi['content']));
        }
    }