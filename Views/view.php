<?php

    class View{
        private $file;
        private $title; // Titre de la page
        private $active; // Page visionnée
        private $widgets;

        public function __construct($action){
            $this->file = '../views/view'.ucfirst($action).'.php';
        }

        public function render($data = NULL,$widgets = NULL){
            extract($data);
            ob_start();
            require $this->file;
            $content = ob_get_clean();

            require '../views/template.php';
        }

    }