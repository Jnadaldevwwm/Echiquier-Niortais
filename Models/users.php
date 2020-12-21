<?php
    require_once 'model.php';

    class Users extends Model{

        public function checkUser($login){
            $sql = "SELECT COUNT(*) as r FROM users WHERE login =?";
            $result = $this->goQuery($sql,array($login));
            $return = $result->fetch();
            $result->closeCursor();
            return $return['r'];
        }
    }