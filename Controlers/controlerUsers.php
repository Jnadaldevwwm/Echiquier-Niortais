<?php

require_once '../Controlers/baseControler.php';
require_once '../views/view.php';
require_once '../Models/users.php';
require_once '../Models/articles.php';

class ControlerUsers extends Controler{
    private $user;
    private $articles;

    public function __construct(){
        $this->user = new Users;
        $this->articles = new Articles;
    }

    public function signUpPage(){
        if(!isset($_SESSION['userToken'])){
            $motd = self::sidebar();
            $view = new View('pageLogin');
            $view->render(array(),array('motd'=>$motd));  
        }else{
            header('Location: ?action=index');
        }
        
    }
    public function signInPage(){
        $motd = self::sidebar();
        $view = new View('signInPage');
        $view->render(array(),array('motd'=>$motd));
    }
    public function signIn($data){
        if(isset($data) && !empty($data)){
            $uLogin = htmlspecialchars($data['username']);
            $uNom = htmlspecialchars($data['nom']);
            $uPrenom = htmlspecialchars($data['prenom']);
            $uMdp = htmlspecialchars($data['password']);
            $hashedMdp = password_hash($uMdp, PASSWORD_DEFAULT);
            if(!empty($_FILES['avatar']['name'])){
                define('WIDTH_MAX', 800);    // Largeur max de l'image en pixels
                define('HEIGHT_MAX', 800);    // Hauteur max de l'image en pixels
                require "../Controlers/scripts/uploadImage.php";
                $uAvatarLink=$nomImage;
                if($message!='OK'){
                    return header('Location: ?action=signInPage&statusUpdate=upload&messageScript='.$message);
                }
            } else {
                $uAvatarLink='default.png';
            }
            $uToken = bin2hex(random_bytes(10));
            $this->user->createUser($uLogin,$uNom,$uPrenom,$hashedMdp,$uAvatarLink,$uToken);


        } else {
            header('Location:?action=index');
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
                    $_SESSION['login']=$user['login'];
                    $_SESSION['userToken']=$user['token'];
                    $_SESSION['id']=$user['id'];
                    $_SESSION['permission']=$user['permission'];
                    $_SESSION['name']=$user['prenom'];
                    $_SESSION['fName']=$user['nom'];
                    $_SESSION['avatar']=$user['avatar'];
                    header('Location: ?action=index');
                }else{
                    $error = "Mot de passe incorrect.";
                }
            } else{
                $error = "Nom d'utilisateur incorrect.";
            }
            $view = new View('pageLogin');
            $motd = self::sidebar();
            return $view->render(array('error' => $error ),array('motd'=>$motd));
        } else{
            header('Location: ?action=index');
        }
        
    }

    public function indexAdmin(){
        if(isset($_SESSION['userToken']) && $this->user->checkToken($_SESSION['userToken'])&&$_SESSION['permission']=='1'){
            $view = new View('indexAdmin');
            $motd = self::sidebar();
            return $view->render(array(),array('motd'=>$motd));
        } else{
            header('Location: ?action=index');
        }
    }

    public function articlesManagement(){
        if(isset($_SESSION['userToken']) && $this->user->checkToken($_SESSION['userToken'])&&$_SESSION['permission']=='1'){
            $articles = $this->articles->getAllArticles();
            $view = new View('articlesManagement');
            $motd = self::sidebar();
            $view->render(array('articles' => $articles),array('motd'=>$motd));
        } else{
            header('Location: ?action=index');
        }
    }

    public function usersManagement(){
        if(isset($_SESSION['userToken']) && $this->user->checkToken($_SESSION['userToken'])&&$_SESSION['permission']=='1'){
            $users = $this->user->getAllUsers();
            $view = new View('usersManagement');
            $motd = self::sidebar();
            $view->render(array('users'=>$users),array('motd'=>$motd));
        }
    }

    public function viewProfil(){
        if(isset($_SESSION['userToken'])){
            $user = $this->user->getOneUser($_SESSION['id']);
            $view = new View('viewProfil');
            $motd = self::sidebar();
            $view->render(array('user'=>$user),array('motd'=>$motd));
        } else {
            header('Location: ?action=index');
        }
    }

    public function updateProfil($dataUser){
        if(isset($_SESSION['userToken']) && $this->user->checkToken($_SESSION['userToken'])){
            $userId = $_SESSION['id'];
            if(!$this->user->checkLoginExist($dataUser['login'])||$dataUser['login']==$_SESSION['login']){
                if(!empty($_FILES['avatar']['name'])){
                    define('WIDTH_MAX', 800);    // Largeur max de l'image en pixels
                    define('HEIGHT_MAX', 800);    // Hauteur max de l'image en pixels
                    require "../Controlers/scripts/uploadImage.php";
                    $dataUser['avatar']=$nomImage;
                    if($_SESSION['avatar']!='defaultPp.png'){
                        unlink('images/uploads/'.$_SESSION['avatar']);   
                    }
                     
                    if($message!='OK'){
                        return header('Location: ?action=viewProfil&statusUpdate=upload&messageScript='.$message);
                    }
                }
                $this->user->updateUser($userId,$dataUser);
                session_destroy();
                session_start();
                $user = $this->user->getOneUser($userId);
                $_SESSION['login']=$user['login'];
                $_SESSION['userToken']=$user['token'];
                $_SESSION['id']=$user['id'];
                $_SESSION['permission']=$user['permission'];
                $_SESSION['name']=$user['prenom'];
                $_SESSION['fName']=$user['nom'];
                $_SESSION['avatar']=$user['avatar'];
                return header('Location: ?action=viewProfil&statusUpdate=OK'); 
                
            } else {
                return header('Location: ?action=viewProfil&statusUpdate=login');
            }
             
        }
        
    }
    public function disconnect(){
        if(isset($_SESSION)){
            session_destroy();
            header('Location: ?action=index');
        }
    }
}