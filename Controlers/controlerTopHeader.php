<?php

require_once '../Controlers/baseControler.php';
require_once '../views/view.php';
require_once '../Models/widgets.php';

class ControlerTopHeader extends Controler{

    public function __construct(){  
    }

    public function topHeaderManagement(){
        if(isset($_SESSION['permission'])&&$_SESSION['permission']=='1'){
            $currentTopHeader = self::topHeader();
            $view = new View('topHeaderManagement');
            $view->render(array('currentTopHeader' => $currentTopHeader),array('motd' => self::motd(),'topheader'=>self::topHeader()));
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