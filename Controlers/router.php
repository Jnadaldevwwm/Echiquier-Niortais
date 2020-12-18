<?php 

    require_once '../Controlers/controlerIndex.php';
    require_once '../Controlers/controlerArticle.php';

    class Router{
        private $ctrlIndex;
        private $ctrlArticle;

        public function __construct(){
            $this->ctrlIndex = new ControlerIndex();
            $this->ctrlArticle = new ControlerArticle();
        }

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

                        default:
                            $this->ctrlIndex->index();
                            break;
                    }
                } else{
                    $this->ctrlIndex->index();
                }
            } catch (Exception $e){
                echo 'OULALALA '.$e->getMessage();
            }
        }

    }