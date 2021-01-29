<?php
// Fonction img64ToFile récupère en entrée une chaine de caractère contenant une image en base 64, convertit cette image en fichier image, la déplace dans le dossier "images/articleImg/"
function img64ToFile($data){
    if (preg_match('/data:image\/(\w+);base64,/', $data, $type)) {  //Regex recherchant "data:image" et capturant le type de l'image.
        $data = substr($data, strpos($data, ',') + 1);  // On récupère le code de l'image
        $type = strtolower($type[1]); // Type de l'image jpg, png, gif
    
        if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {    // On vérifie si l'extension/type de l'image est correcte
            throw new \Exception('Type d\'image invalide');
        }
        $data = str_replace( ' ', '+', $data );
        $data = base64_decode($data);   // On convertit l'image
    
        if ($data === false) {
            throw new \Exception('base64_decode failed');   // Exception si la convertion echoue
        }
    } else {    
        throw new \Exception('L\expression régulière n\'a pas trouvé d\'image');    // Exception si la regex ne trouve rien
    }
    $nomImg = md5(uniqid()).".{$type}"; // Création d'un nom unique pour l'image
    file_put_contents($nomImg, $data);  // Création de l'image
    rename($nomImg,'images/articleImg/'.$nomImg);   // Déplacement de l'image dans le dossier spécifié
    return $nomImg;     // On retourne le nom
}

// FOnction articleImageReplacer qui on complément de la fonction img64ToFile, convertit une chaine de caractère comportant des images base 64 remplaçant les src des balises images par la bonne src des images créés par la fonction img64ToPng
function articleImageReplacer($content){
    $resultats = array();
    $pattern = '/<img src=("data:image[\w\W]+?)>/'; // Regex qui recherche les balises img contenant du data:image et capturant l'attribut src
    preg_match_all($pattern, $content, $resultats);
    foreach($resultats[1] as $value){
        $nomImg = img64ToFile($value);  // A chaque fois que l'on trouve une img64, on la convertit en fichier.
        $attribut ="'images/articleImg/{$nomImg}'";
        $content = str_replace($value,$attribut,$content);  // On remplace l'attribut src par le nouveau.
    }
    return $content;
}
