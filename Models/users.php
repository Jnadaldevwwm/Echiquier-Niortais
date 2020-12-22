<?php
    require_once 'model.php';

    class Users extends Model{

        // Methode qui vérifie l'existance d'un utilisateur en fonction de son login.
        public function checkUser($login){
            $sql = "SELECT COUNT(*) as r FROM users WHERE login =?";
            $result = $this->goQuery($sql,array($login));
            $return = $result->fetch();
            $result->closeCursor();
            if($return['r']==1){
                return true;
            } else {
                return false;
            }
        }
        // Methode qui retourne toutes les données d'un user en fonction de son login.
        public function returnUser($login){
            $sql = "SELECT * FROM users WHERE login=?";
            $user = $this->goQuery($sql,array($login));
            $result = $user->fetch();
            $user->closeCursor();
            return $result;
        }
    }