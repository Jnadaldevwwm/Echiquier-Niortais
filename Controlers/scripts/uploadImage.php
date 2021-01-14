<?php 
    
    // Constantes
    define('TARGET', 'images/uploads/');    // Repertoire cible
    define('MAX_SIZE', 10000000);    // Taille max en octets du fichier

    
    // Tableaux de donnees
    $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
    $infosImg = array();
    
    // Variables
    $extension = '';
    $message = '';
    $nomImage = '';
    
    
    /************************************************************
     * Script d'upload
     *************************************************************/
    if(!empty($_POST))
    {
    // On verifie si le champ est rempli
    if( !empty($_FILES['avatar']['name']) )
    {
        echo $_FILES['avatar']['name'].'22';
        // Recuperation de l'extension du fichier
        $extension  = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    
        // On verifie l'extension du fichier
        if(in_array(strtolower($extension),$tabExt))
        {
        // On recupere les dimensions du fichier
        $infosImg = getimagesize($_FILES['avatar']['tmp_name']);
    
        // On verifie le type de l'image
        if($infosImg[2] >= 1 && $infosImg[2] <= 14)
        {
            // On verifie les dimensions et taille de l'image
            if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['avatar']['tmp_name']) <= MAX_SIZE))
            {
            // Parcours du tableau d'erreurs
            if(isset($_FILES['avatar']['error']) 
                && UPLOAD_ERR_OK === $_FILES['avatar']['error'])
            {
                // On renomme le fichier
                $nomImage = md5(uniqid()) .'.'. $extension;
    
                // Si c'est OK, on teste l'upload
                if(move_uploaded_file($_FILES['avatar']['tmp_name'], TARGET.$nomImage))
                {
                $message = 'OK';
                }
                else
                {
                // Sinon on affiche une erreur systeme
                $message = 'Problème lors de l\'upload !';
                }
            }
            else
            {
                $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
            }
            }
            else
            {
            // Sinon erreur sur les dimensions et taille de l'image
            $message = 'Image trop grande !';
            }
        }
        else
        {
            // Sinon erreur sur le type de l'image
            $message = 'Veuillez choisir une image !';
        }
        }
        else
        {
        // Sinon on affiche une erreur pour l'extension
        $message = 'Le format de l\'image n\'est pas accepté';
        }
    }
    else
    {
        // Sinon on affiche une erreur pour le champ vide
        $message = 'Veuillez remplir le formulaire svp !';
    }
    }
    echo $message;
    echo $infosImg[0].' '.$infosImg[1];