<?php
    require_once 'model.php';

    class Motd extends Model{

        public function getMotd(){
            $sql = "SELECT * FROM motd WHERE id=1";
            $motd = $this->goQuery($sql);
            $result = $motd->fetch();
            $motd->closeCursor();
            return $result;
        }
        public function updateMotd($newMotd){
            $sql = 'UPDATE motd SET title=?, content=? WHERE id=1';
            return $this->goQuery($sql,array($newMotd['titreMotd'],$newMotd['contenuMotd']));
        }
    }