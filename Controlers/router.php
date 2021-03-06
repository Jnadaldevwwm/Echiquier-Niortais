<?php 
    session_start();

    require_once '../Controlers/controlerIndex.php';
    require_once '../Controlers/controlerArticle.php';
    require_once '../Controlers/controlerUsers.php';
    require_once '../Controlers/controlerMotd.php';

    class Router{
        private $ctrlIndex;
        private $ctrlArticle;
        private $ctrlUsers;
        private $ctrlMotd;

        public function __construct(){
            $this->ctrlIndex = new ControlerIndex();
            $this->ctrlArticle = new ControlerArticle();
            $this->ctrlUsers = new ControlerUsers();
            $this->ctrlMotd = new ControlerMotd();
        }

        // Router simple en fonction du paramètre "action" passé en GET.
        public function route(){
            try{
                if(isset($_GET['action'])){
                    switch ($_GET['action']) {
                        case 'index':
                            $this->ctrlIndex->index();
                            break;
                        
                        case 'article':
                            $this->ctrlArticle->pageArticle($_GET['idArticle']);
                            break;
                        case 'adminLoginPage':
                            $this->ctrlUsers->pageLogin();
                            break;
                        case 'signUp':
                            $dataConn = $_POST;
                            $this->ctrlUsers->signUp($dataConn);
                            break;
                        case 'signInPage':
                            $this->ctrlUsers->signInPage();
                            break;
                        case 'indexAdmin':
                            $this->ctrlUsers->indexAdmin();
                            break;
                        case 'articlesManagement':
                            $this->ctrlUsers->articlesManagement();
                            break;
                        case 'usersManagement':
                            $this->ctrlUsers->usersManagement();
                            break;
                        case 'motdManagement':
                            $this->ctrlMotd->motdManagement();
                            break;
                        case 'upMotd':
                            $newMotd = $_POST;
                            $this->ctrlMotd->motdUpdate($newMotd);
                            break;
                        case 'viewProfil':
                            $this->ctrlUsers->viewProfil();
                            break;
                        case 'updateProfil':
                            $dataUser = $_POST;
                            $this->ctrlUsers->updateProfil($dataUser);
                            break;
                        case 'disconnect':
                            $this->ctrlUsers->disconnect();
                            break;
                        default:
                            $this->ctrlIndex->index();
                            break;
                    }
                } else{
                    $this->ctrlIndex->index();
                }
            } catch (Exception $e){
                echo 'Erreur : '.$e->getMessage();
            }
        }

    }