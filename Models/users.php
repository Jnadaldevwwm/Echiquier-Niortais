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
        public function checktoken($token){
            $sql = "SELECT COUNT(*) as r FROM users WHERE token=?";
            $result = $this->goQuery($sql,array($token));
            $return = $result->fetch();
            $result->closeCursor();
            if($return['r']==1){
                return true;
            } else {
                return false;
            }
        }
        public function checkLoginExist($login){
            $sql ="SELECT COUNT(*) as r FROM users WHERE login=?";
            $result = $this->goQuery($sql,array($login));
            $return = $result->fetch();
            $result->closeCursor();
            if(intval($return['r'])>0){
                return true;
            }else{
                return false;
            }
        }

        public function getAllUsers(){
            $sql = "SELECT * FROM users u INNER JOIN role r ON u.permission = r.id";
            $result = $this->goQuery($sql);
            $users = $result->fetchAll();
            $result->closeCursor();
            return $users;
        }
        public function getOneUser($userId){
            $sql = "SELECT * FROM users WHERE id =?";
            $user = $this->goQuery($sql,array($userId));
            $result = $user->fetch();
            $user->closeCursor();
            return $result;
        }
        public function updateUser($userId,$dataUser){
            $sql = "UPDATE users SET login=?, nom=?, prenom=?, avatar=? WHERE id=?";
            $this->goQuery($sql,array($dataUser['login'],$dataUser['nom'],$dataUser['prenom'],$dataUser['avatar'],$userId));
        }
    }