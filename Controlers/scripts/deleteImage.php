<?php
function imageRemover($content){
    $pattern = "/<img src='images\/articleImg\/([\w\W]+?)'>/";
    $resultats = array();
    preg_match_all($pattern, $content, $resultats);
    foreach($resultats[1] as $value){
        unlink('images/articleImg/'.$value);
    }
}