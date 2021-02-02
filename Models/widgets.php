<?php
    require_once 'model.php';

    class Widgets extends Model{

        public function getMotd(){
            $sql = "SELECT * FROM widgets WHERE fonctio='motd'";
            $motd = $this->goQuery($sql);
            $result = $motd->fetch();
            $motd->closeCursor();
            return $result;
        }
        public function getTopHeader(){
            $sql = "SELECT * FROM widgets WHERE fonctio='topheader'";
            $topheader = $this->goQUery($sql);
            $result = $topheader->fetch();
            $topheader->closeCursor();
            return $result;
        }


        public function updateMotd($newMotd){
            $sql = 'UPDATE widgets SET title=?, content=? WHERE fonctio=\'motd\'';
            return $this->goQuery($sql,array($newMotd['titreMotd'],$newMotd['contenuMotd']));
        }
        public function updateTopHeader($newTopHeader){
            $sql = 'UPDATE widgets SET content=? WHERE fonctio=\'topheader\'';
            return $this->goQuery($sql, array($newTopHeader));
        }
    }