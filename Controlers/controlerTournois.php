<?php

require_once '../Controlers/baseControler.php';
require_once '../views/view.php';
require_once '../Models/tournois.php';

class ControlerTournois extends Controler{
    private $tournois;

    function __construct(){
        $this->tournois = new Tournois();
    }
}