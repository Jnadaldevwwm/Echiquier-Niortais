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

        $view = new View('TournoiCreation');
        $view->render(array(),array('motd'=>self::motd()));
    }

    public function tournoisManagement(){

        
        $view = new View('TournoiCreation');
        $view->render(array(),array('motd'=>self::motd()));
    }



    public function getTournois(){
        $tournois = $this->tournois->getTournois();
        echo json_encode($tournois);
    }
    public function getTournoisDate(){
        $date = $_GET['date'];
        $tournois = $this->tournois->getTournoisDate($date);
        echo json_encode($tournois);
    }

    public function addTournoi(){
        $dataTournoi = $_POST;
        $this->tournois->addTournoi($dataTournoi);
        header('Location:?action=tournoiCreationPage');
    }
}