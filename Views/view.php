<?php

    class View{
        private $file;
        private $title;
        private $widgets;

        public function __construct($action){
            $this->file = '../views/view'.ucfirst($action).'.php';
        }

        public function render($data,$widgets){
            extract($data);
            ob_start();
            require $this->file;
            $content = ob_get_clean();

            require '../views/template.php';
        }

    }