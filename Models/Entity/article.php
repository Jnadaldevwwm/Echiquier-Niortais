<?php
    class Article{
        private $title;
        private $content;
        private $image;
        private $author;
        private $date;

        public function __construct(){

        }
        public function getTitle(){
            return $this->title;
        }
        public function setTitle($title){
            $this->title = $title;
        }
        public function getContent(){
            return $this->content;
        }
        public function setContent($content){
            $this->content = $content;
        }
        public function getImage(){
            return $this->image;
        }
        public function setImage($img){
            $this->image = $img;
        }
        public function getAuthor(){
            return $this->author;
        }
        public function setAuthor($auth){
            $this->author = $auth;
        }
        public function getDate(){
            return $this->date;
        }
        public function setDate($date){
            $this->date = $date;
        }
    }