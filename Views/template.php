<?php
  

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
<div id="togglingMenu" class='togglingMenu hidden'>
        <nav id='dynamicNav'>
            <ul>
            <li><a href="">Accueil</a></li>
            <li><a href="">Présentation▾</a></li>
            <li><a href="">Lien 3</a></li>
            <li><a href="">Contact</a></li>
            </ul>
        </nav>
</div>
    <div id="topHeader">
        <span>L'Echiquier Niortais - 49 rue de Ribray 7900 Niort - Tel : 06 85 57 74 60 - E-Mail : echiquiers.niortais@gmail.com
        </span>
    </div>
    <section id="visuelPage">
        <header>
            <div id="banner">
                <a href="?action='index'"><img src="images/logo.gif" alt="logo echiquier niortais" id="logoSite"></a>
                <div id="linksBanner">
                    <a href="http://www.echecs.asso.fr/"><img src="images/Logo_FFE.jpg" alt="logo fédération française d'echecs"></a>
                    <a href="https://twitter.com/EchiquierNiort?lang=fr"><img src="images/Logo_Twitter.png" alt=""></a>
                    <a href="https://www.facebook.com/pg/echiquierniortais/events/?ref=page_internal"><img src="images/Logo_Facebook.png" alt=""></a>
                    <a href="https://www.instagram.com/echiquierniortais/"><img src="images/Logo_Instagram.png" alt=""></a>
                </div>
            </div>
            <div id='navBar'>
                <div id="hamburger">=</div>
                <nav id='desktopNav'>
                    <ul>
                        <li><a href="">Accueil</a></li>
                        <li class='pRelativ'><a href="" id='navPres'>Présentation▾</a>
                            <div id='presDisplay' class='hidden'>
                                
                                        <a href="">Lien 1</a>
                                    
                                        <a href="">Lien 2</a>
                                 
                            </div>
                        </li>
                        <li><a href="">Lien 3</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </nav>
                <?php
                    if(!isset($_SESSION['userToken'])){
                        echo '<a href="?action=adminLoginPage"><button class="ctaButton" id="connButton">Se Connecter !</button></a>';
                    } else{
                        echo '<div id="isConn">
                                <span>'.ucfirst($_SESSION["name"]).'</span>
                                <div class="roundAvatar">
                                    <img src="images/uploads/'.$_SESSION['avatar'].'" alt="avatar" class="">
                                </div>
                            </div>
                            <nav class="menuProfil hidden">
                                <ul>
                                    <li><a href="?action=disconnect">Se déconnecter</a></li>
                                    ';
                                    if($_SESSION['permission']=='1'){
                                        echo '<li><a href="?action=indexAdmin">Panneau d\'administration</a></li>';
                                    }
                                    echo '
                                    <li><a href="?action=viewProfil">Mon profil</a></li>
                                <ul>
                            </nav>
                            ';
                    }
                ?>
            </div>
        </header>

        <section id="midContent">
            <main>
                <?= $content ?>
            </main>
            <aside>
                <div id="motd">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae ipsam totam quasi libero. Ad voluptates voluptatibus corporis tenetur quia molestias excepturi accusamus officiis velit. Quibusdam, asperiores. Maiores est quidem quod consequuntur beatae inventore dolorem nobis minus magnam eaque? Explicabo, dolor nam sapiente error repellendus eos tempore voluptatibus totam enim quae.
                </div>
            </aside>
        </section>
    </section>
    <footer>
        Le footer
    </footer>
    <script src="scripts/script.js"></script>
</body>
</html>