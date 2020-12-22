<?php

require_once '../views/view.php';
require_once '../Models/users.php';
require_once '../Models/articles.php';

class ControlerUsers{
    private $user;
    private $articles;

    public function __construct(){
        $this->user = new Users;
        $this->articles = new Articles;
    }

    public function pageLogin(){
        if(!isset($_SESSION['userToken'])){
            $view = new View('pageLogin');
            $view->render(array());  
        }else{
            header('Location: ?action=indexAdmin');
        }
        
    }
    //signUp : Methode de verification et d'initialisation de session à la connection d'un utilisateur. Prend en paramètre $data : les datas en POST envoyés par le formulaire de connection.
    public function signUp($data){
        if(isset($data['mdp'])&& isset($data['login']) && !isset($_SESSION['userToken'])){
            $password = htmlspecialchars($data['mdp']);
            $login = htmlspecialchars($data['login']);
            // D'abbord on vérifie que le login renseigné par l'user à une correspondance dans la db
            if($this->user->checkUser($login)){
                //Si oui on récupère les données de cet user.
                $user = $this->user->returnUser($login);
                //On vérifie que les mot de passe est bon
                if(password_verify($password,$user['password'])){
                    $error = false;
                    $_SESSION['userToken']=$user['token'];
                    $view = new View('indexAdmin');
                    return $view->render(array());
                }else{
                    $error = "Mot de passe incorrect.";
                }
            } else{
                $error = "Nom d'utilisateur incorrect.";
            }
            $view = new View('pageLogin');
            return $view->render(array('error' => $error ));
        } else{
            header('Location: ?action=index');
        }
        
    }

    public function indexAdmin(){
        if(isset($_SESSION['userToken'])){
            $view = new View('indexAdmin');
            return $view->render(array());
        } else{
            header('Location: ?action=index');
        }
    }

    public function articleManagement(){
        $articles = $this->articles->getAllArticles();
        $view = new View('articlesManagement');
        $view->render(array('articles' => $articles));
    }
}