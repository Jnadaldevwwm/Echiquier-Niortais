<?php 
    session_start();

    require_once '../Controlers/controlerIndex.php';
    require_once '../Controlers/controlerArticle.php';
    require_once '../Controlers/controlerUsers.php';

    class Router{
        private $ctrlIndex;
        private $ctrlArticle;
        private $ctrlUsers;

        public function __construct(){
            $this->ctrlIndex = new ControlerIndex();
            $this->ctrlArticle = new ControlerArticle();
            $this->ctrlUsers = new ControlerUsers();
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
                        case 'indexAdmin':
                            $this->ctrlUsers->indexAdmin();
                            break;
                        case 'articlesManagement':
                            $this->ctrlUsers->articleManagement();
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