<?php

    class View{
        private $file;
        private $title;
        private $sidebar;

        public function __construct($action){
            $this->file = '../views/view'.ucfirst($action).'.php';
            $this->sidebar ='../Views/inc/sidebar.php';
        }

        public function render($data,$sidebar){
            extract($data);
            ob_start();
            require $this->file;
            $content = ob_get_clean();

            extract($sidebar);
            ob_start();
            require $this->sidebar;
            $aside = ob_get_clean();

            require '../views/template.php';
        }

    }