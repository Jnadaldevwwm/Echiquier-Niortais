<?php 
    session_start();

    require_once '../Controlers/controlerIndex.php';
    require_once '../Controlers/controlerArticle.php';
    require_once '../Controlers/controlerUsers.php';
    require_once '../Controlers/baseControler.php';
    require_once '../Controlers/controlerTournois.php';
    require_once '../Controlers/controlerWidgets.php';

    class Router{
        private $ctrlIndex;
        private $ctrlArticle;
        private $ctrlUsers;
        private $ctrlBase;
        private $ctrlTournois;
        private $ctrlWidgets;

        public function __construct(){
            $this->ctrlIndex = new ControlerIndex();
            $this->ctrlArticle = new ControlerArticle();
            $this->ctrlUsers = new ControlerUsers();
            $this->ctrlBase = new Controler();
            $this->ctrlTournois = new ControlerTournois();
            $this->ctrlWidgets = new ControlerWidgets();
        }

        // Router simple en fonction du paramètre "action" passé en GET.
        public function route(){
            try{
                if(isset($_GET['action'])){
                    switch ($_GET['action']) {
                        case 'index':   // Accueil
                            $this->ctrlIndex->index();
                            break;
                        case 'article':
                            $this->ctrlArticle->pageArticle($_GET['idArticle']);
                            break;
                        case 'signUpPage':
                            $this->ctrlUsers->signUpPage();
                            break;
                        case 'signUp':
                            $dataConn = $_POST;
                            $this->ctrlUsers->signUp($dataConn);
                            break;
                        case 'signInPage':
                            $this->ctrlUsers->signInPage();
                            break;
                        case 'signIn':
                            $this->ctrlUsers->signIn($_POST);
                            break;
                        case 'activation':
                            $this->ctrlUsers->activation();
                            break;
                        case 'indexAdmin':
                            $this->ctrlUsers->indexAdmin();
                            break;
                        case 'search':
                            $this->ctrlArticle->searchArticle();
                            break;
                        case 'articlesManagement':
                            $this->ctrlUsers->articlesManagement();
                            break;
                        case 'newArticle':
                            $this->ctrlArticle->pageNewArticle();
                            break;
                        case 'addArticle':
                            $this->ctrlArticle->createArticle();
                            break;
                        case 'editArticle':
                            $this->ctrlArticle->editArticle($_GET['idArticle']);
                            break;
                        case 'edit':
                            $this->ctrlArticle->edit();
                            break;
                        case 'deleteArticle':
                            $this->ctrlArticle->deleteArticle($_GET['idArticle']);
                            break;
                        case 'usersManagement':
                            $this->ctrlUsers->usersManagement();
                            break;
                        case 'deleteUser':
                            $this->ctrlUsers->deleteUser();
                            break;
                        case 'adminCreateUserPage':
                            $this->ctrlUsers->adminCreateUserPage();
                            break;
                        case 'changeRoleUser':
                            $this->ctrlUsers->changeRoleUser();
                            break;
                        case 'motdManagement':
                            $this->ctrlWidgets->motdManagement();
                            break;
                        case 'upMotd':
                            $newMotd = $_POST;
                            $this->ctrlWidgets->motdUpdate($newMotd);
                            break;
                        case 'topHeaderManagement':
                            $this->ctrlWidgets->topHeaderManagement();
                            break;
                        case 'viewProfil':
                            $this->ctrlUsers->viewProfil();
                            break;
                        case 'updateProfil':
                            $dataUser = $_POST;
                            $this->ctrlUsers->updateProfil($dataUser);
                            break;
                        case 'tournoiCreationPage':
                            $this->ctrlTournois->tournoiCreationPage();
                            break;
                        case 'tournoisManagement':
                            $this->ctrlTournois->tournoisManagement();
                            break;
                        case 'getTournois':
                            $this->ctrlTournois->getTournois();
                            break;
                        case 'getTournoisDate':
                            $this->ctrlTournois->getTournoisDate();
                            break;
                        case 'addTournoi':
                            $this->ctrlTournois->addTournoi();
                            break;
                        case 'disconnect':
                            $this->ctrlUsers->disconnect();
                            break;
                        case 'test':
                            $this->ctrlIndex->test();
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