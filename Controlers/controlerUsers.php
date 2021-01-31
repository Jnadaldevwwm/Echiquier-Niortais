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
            $view = new View('pageLogin');
            $view->render(array(),array('motd'=>self::motd()));  
        }else{
            header('Location: ?action=index');
        }
        
    }

    // Controleurs pour l'inscription sur le site
    // Génère la view :
    public function signInPage(){
        $view = new View('signInPage');
        $view->render(array(),array('motd'=>self::motd()));
    }
    // Créer l'utilisateur
    public function signIn($data){
        if($this->user->getUserByLogin(htmlspecialchars($data['username'])) == false){
            if(isset($data) && !empty($data)){
                $uLogin = htmlspecialchars($data['username']);
                $uNom = htmlspecialchars($data['nom']);
                $uPrenom = htmlspecialchars($data['prenom']);
                $uMail = htmlspecialchars($data['email']);
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
                    $uAvatarLink='defaultPp.png';
                }
                $uToken = md5(microtime(TRUE)*100000);
                $this->user->createUser($uLogin,$uNom,$uPrenom,$uMail,$hashedMdp,$uAvatarLink,$uToken);
                // Mail confirmation
                $destinataire = $uMail;
                $sujet = "Activer votre compte";
                $entete = "From : inscriptionechiquier@juliennadal-larios.fr";
                $message = "Bienvenue sur Echiquier Niortais,
                
                Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur Internet.
                
                http://echiquierniortais.juliennadal-larios.fr/index.php?action=activation&log=".urlencode($uLogin)."&token=".urlencode($uToken)."

                ------------------------
                Ceci est un mail automatique, Merci de ne pas y repondre.";
                mail($destinataire, $sujet, $message, $entete);
                echo "Un mail de confirmation vous a été envoyé, Vous allez être redirigé...";
                header( "refresh:5;url=index.php" );

            } else {
                header('Location:?action=index');
            }
        } else {
            $message = "Un utilisateur avec ce nom d'utilisateur existe déja";
            header("Location: ?action=signInPage&statusUpdate=upload&messageScript={$message}");
        }
    }

    public function activation(){
        $uLogin = htmlspecialchars(urldecode($_GET['log']));
        $uToken = htmlspecialchars(urldecode($_GET['token']));
        $this->user->setActive($uLogin,$uToken);
        echo "Votre compte a bien été activé. Vous allez être redirigé...";
        header("refresh:4;url=index.php?action=signUpPage");
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
                    // On verifie que le compte est actif
                    if($user['statut'] != false){
                        $error = false; // Pas d'erreurs
                        $_SESSION['login']=$user['login'];      //  On set toutes nos variables de session
                        $_SESSION['userToken']=$user['token'];
                        $_SESSION['id']=$user['id'];
                        $_SESSION['permission']=$user['permission'];
                        $_SESSION['name']=$user['prenom'];
                        $_SESSION['fName']=$user['nom'];
                        $_SESSION['avatar']=$user['avatar'];
                        header('Location: ?action=index');
                    } else {
                        $error = "Le compte n'est pas encore activé";
                    }
                }else{
                    $error = "Mot de passe incorrect."; // Si le mdp est incorrect
                }
            } else{
                $error = "Nom d'utilisateur incorrect.";    // Si le login est incorrect
            }
            $view = new View('pageLogin');
            return $view->render(array('error' => $error ),array('motd'=>self::motd()));
        } else{
            header('Location: ?action=index');
        }
        
    }

    public function indexAdmin(){
        if(isset($_SESSION['userToken']) && $this->user->checkToken($_SESSION['userToken'])&&$_SESSION['permission']=='1'){
            $view = new View('indexAdmin');
            return $view->render(array(),array('motd'=>self::motd()));
        } else{
            header('Location: ?action=index');
        }
    }

    public function articlesManagement(){
        if(isset($_SESSION['userToken']) && $this->user->checkToken($_SESSION['userToken'])&&$_SESSION['permission']=='1'){
            if(isset($_GET['page']) && !empty($_GET['page'])){
                $currentPage = (int) strip_tags($_GET['page']);
            }else{
                $currentPage = 1;
            }
            $nbArticles = (int)$this->articles->countAllArticles();
            $parPage = 20;
            $nbPages = ceil($nbArticles/$parPage);
            $premier = ($currentPage * $parPage) - $parPage;
            $articles = $this->articles->getArticlesPage($premier,$parPage);
    
            $pagination = array('currentPage'=>$currentPage,'pages'=>$nbPages);
    
            $view = new View('articlesManagement');
            $view->render(array('articles'=>$articles,'pagination'=>$pagination,'nbArticles'=>$nbArticles,'artParPage'=>$parPage),array('motd'=>self::motd()));
        } else{
            header('Location: ?action=index');
        }
    }

    public function usersManagement(){
        if(isset($_SESSION['userToken']) && $this->user->checkToken($_SESSION['userToken'])&&$_SESSION['permission']=='1'){
            $users = $this->user->getAllUsers();
            $view = new View('usersManagement');
            $view->render(array('users'=>$users),array('motd'=>self::motd()));
        }
    }

    public function viewProfil(){
        if(isset($_SESSION['userToken'])){
            $user = $this->user->getOneUser($_SESSION['id']);
            $view = new View('viewProfil');
            $view->render(array('user'=>$user),array('motd'=>self::motd()));
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
    public function deleteUser(){
        if(isset($_SESSION['permission']) && $_SESSION['permission'] == '1'){
            $userId = $_GET['userId'];
            $this->user->deleteUser($userId);
        } else {
            return header('Location: ?action=index');
        }
    }
    public function adminCreateUserPage(){
        if(isset($_SESSION['permission']) && $_SESSION['permission'] == '1'){
            $view = new View('AdminCreateUser');
            $view->render(array('user'=>$user),array('motd'=>self::motd()));
        }
    }
    public function changeRoleUser(){
        if(isset($_SESSION['permission']) && $_SESSION['permission'] == '1'){
            $this->user->changeRoleUser($_GET['userId'],$_GET['newRole']);
        }
    }
    public function disconnect(){
        if(isset($_SESSION)){
            session_destroy();
            header('Location: ?action=index');
        }
    }
}