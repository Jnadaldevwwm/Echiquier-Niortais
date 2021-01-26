<?php

require_once '../Controlers/baseControler.php';
require_once '../views/view.php';
require_once '../Models/tournois.php';

class ControlerTournois extends Controler{
    private $tournois;

    function __construct(){
        $this->tournois = new Tournois();
    }

    public function tournoiCreationPage(){

        $motd = self::sidebar();
        $view = new View('TournoiCreation');
        $view->render(array(),array('motd'=>$motd));
    }

    public function getTournois(){
        $tournois = $this->tournois->getTournois();
        echo json_encode($tournois);
    }

    public function addTournoi(){
        
    }
}