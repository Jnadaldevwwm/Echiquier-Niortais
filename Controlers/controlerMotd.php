<?php

require_once '../Controlers/baseControler.php';
require_once '../views/view.php';
require_once '../Models/motd.php';

class ControlerMotd extends Controler{
    private $motd;

    public function __construct(){
        $this->motd = new Motd();
    }

    public function motdManagement(){
        if(isset($_SESSION['permission'])&&$_SESSION['permission']=='1'){
            $currentMotd = $this->motd->getMotd();
            $motd = self::sidebar();
            $view = new View('motdManagement');
            $view->render(array('currentMotd' => $currentMotd),array('motd' => $motd));
        } else {
            return header('Location: ?action=index');
        }
    }
    public function motdUpdate($newMotd){
        if(isset($newMotd)){
            $this->motd->updateMotd($newMotd);
            return header('Location: ?action=motdManagement&upMotdStat="ok"');
        }
    }
}