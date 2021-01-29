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
    <link rel="stylesheet" href="css/quill.snow.css">
    <link rel="stylesheet" href="css/calendrier.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
</head>
<body>
<div id="togglingMenu" class='togglingMenu hidden'>
        <nav id='dynamicNav'>
            <ul>
            <li><a href="">Accueil</a></li>
            <li>
                <a href="" id='presentation'>Présentation▾</a>
                <ul id='presSmart' class='dNone'>
                    <li><a href="" class='lienDeroule'>Nous rejoindre</a></li>
                    <li><a href="" class='lienDeroule'>Qui sommes nous ?</a></li>
                    <li><a href="" class='lienDeroule'>Lien 3</a></li>     
                </ul>
            </li>
            <li>
                <a href="" id="tournois">Tournois▾</a>
                <ul id='tournoisSmart' class='dNone'>
                    <li><a href="" class='lienDeroule'>Type tournoi 1</a></li>
                    <li><a href="" class='lienDeroule'>Type tournoi 2</a></li>
                    <li><a href="" class='lienDeroule'>Type tournoi 3</a></li>     
                </ul>
            </li>
            <li><a href="">Evènements</a></li>
            <li><a href="">Contact</a></li>
            </ul>
        </nav>
</div>
    <div id="topHeader">
        <span>L'Echiquier Niortais - 49 rue de Ribray 79000 Niort - Tel : 06 85 57 74 60 - E-Mail : echiquiers.niortais@gmail.com
        </span>
    </div>
    <div id="visuelPage">
        <header>
            <div id="banner">
                <a href="?action='index'"><img src="images/logo.gif" alt="logo echiquier niortais" id="logoSite"></a>
                <div id="linksBanner">
                    <a href="http://www.echecs.asso.fr/" target="_blank"><img src="images/Logo_FFE.jpg" alt="logo fédération française d'echecs"></a>
                    <a href="https://twitter.com/EchiquierNiort?lang=fr" target="_blank"><img src="images/Logo_Twitter.png" alt=""></a>
                    <a href="https://www.facebook.com/pg/echiquierniortais/events/?ref=page_internal" target="_blank"><img src="images/Logo_Facebook.png" alt=""></a>
                    <a href="https://www.instagram.com/echiquierniortais/" target="_blank"><img src="images/Logo_Instagram.png" alt=""></a>
                </div>
            </div>
            <div id='navBar'>
                <div id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                
                <nav id='desktopNav'>
                    <ul>
                        <li><a href="?action=index">Accueil</a></li>
                        <li class='pRelativ'>
                            <a href="" id='navPres'>Présentation▾</a>
                            <div id='presDisplay' class='hidden'>
                                        <a href="" class='lienDeroule'>Nous rejoindre</a>
                                        <a href="" class='lienDeroule'>Qui sommes nous ?</a>
                                        <a href="" class='lienDeroule'>Lien 3</a>
                            </div>
                        </li>
                        <li class='pRelativ'>
                            <a href="" id='navTournois'>Tournois▾</a>
                            <div id='tournoisDisplay' class='hidden'>
                                        <a href="" class='lienDeroule'>Type tournoi 1</a>
                                        <a href="" class='lienDeroule'>Type tournoi 2</a>
                                        <a href="" class='lienDeroule'>Type tournoi 3</a>
                            </div>
                        </li>
                        <li><a href="">Evènements</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </nav>
                <?php
                    if(!isset($_SESSION['userToken'])){
                        echo '<a href="?action=signUpPage"><button class="ctaButton" id="connButton">Se Connecter !</button></a>';
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
                                    if($_SESSION['permission']=='1'||$_SESSION['permission']=='2'){
                                        echo '<li><a href="?action=indexAdmin">Panneau d\'administration</a></li>';
                                    }
                                    echo '
                                    <li><a href="?action=viewProfil">Mon profil</a></li>
                                </ul>
                            </nav>
                            ';
                    }
                ?>
            </div>
        </header>

        <div id="midContent">
            <main>
                <?= $content ?>
            </main>
            <aside>
                <section>
                    <div id="motdZ">
                        <br>
                        <?= $aside ?>
                    </div>
                    <hr>
                    <div id="searchZ">
                        <h4 class="txtCenter">Rechercher un article : </h4>
                        <br>
                        <form action="?action=search" method="POST" class='txtCenter'>
                            <input type="text" name="search" id="search" autocomplete='off'>
                            <input type="submit" id="searchSubmit" value="Chercher">
                        </form>
                    </div>
                    <hr>
                    <div id="tweeter">
                        <h3 class='txtCenter'>Derniers Tweets : </h3>
                        <br>
                        <div id="tweetBox">
                           <a class="twitter-timeline" data-height="500" href="https://twitter.com/EchiquierNiort?ref_src=twsrc%5Etfw">Tweets by EchiquierNiort</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
                        </div>
                        
                    </div>
                </section>
            </aside>
        </div>
    </div>
    <footer>
        Mentions légals et autres...
    </footer>
    <script src="scripts/script.js"></script>
</body>
</html>