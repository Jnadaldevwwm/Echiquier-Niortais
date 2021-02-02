<?php
    require_once '../Models/widgets.php';
    class Controler{
        public static $widgets;

        public function __construct(){
            static::$widgets = new Widgets;
        }
        public static function motd(){
           $motd = self::$widgets;
           return $motd->getMotd();
        }
        public static function topHeader(){
            $topHeader = self::$widgets;
            return $topHeader->getTopHeader();
        }
    }