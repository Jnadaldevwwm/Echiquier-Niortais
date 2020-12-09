<?php 

    require_once '../Controlers/controlerIndex.php';

    class Router{
        private $ctrlIndex;

        public function __construct(){
            $this->ctrlIndex = new ControlerIndex();
        }

        public function route(){
            try{
                if(isset($_GET['action'])){
                    switch ($_GET['action']) {
                        case 'index':
                            $this->ctrlIndex->index();
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