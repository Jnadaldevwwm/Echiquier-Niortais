<?php

require_once '../Controlers/baseControler.php';
require_once '../views/view.php';
require_once '../Models/widgets.php';

class ControlerWidgets extends Controler{

    public function __construct(){
        
    }

    public function motdManagement(){
        if(isset($_SESSION['permission'])&&$_SESSION['permission']=='1'){
            $currentMotd = self::motd();
            $view = new View('motdManagement');
            $view->render(array('currentMotd' => $currentMotd),array('motd' => self::motd(),'topheader'=>self::topHeader()));
        } else {
            return header('Location: ?action=index');
        }
    }
    public function motdUpdate($newMotd){
        if(isset($newMotd)){
            self::$widgets->updateMotd($newMotd);
            return header('Location: ?action=motdManagement&upMotdStat="ok"');
        }
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
    public function topHeaderUpdate(){
        if(isset($_POST) && isset($_SESSION['permission']) && $_SESSION['permission']=='1'){
            self::$widgets->updateTopHeader($_POST['contenu']);
            return header('Location: ?action=topHeaderManagement&upStat="ok"');
        }
    }
}