<?php
    require_once '../Models/motd.php';
    class Controler{
        private static $motd;

        public function __construct(){
            static::$motd = new Motd;
        }
        public static function sidebar(){
           $motd = self::$motd;
           return $motd->getMotd();
        }
    }