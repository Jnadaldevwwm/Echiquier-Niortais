<?php
    $this->title = 'Accueil admin';
?>

<!-- <h1>ACCUEIL ADMINISTRATION</h1>
<ul>
    <li>
        <a href="?action=motdManagement"><img src="images/annouceIcon.png" alt="icone megaphone"></a>
    </li>
    <li>
        <a href="?action=articlesManagement">Gérer les articles.</a>
    </li>
    <li>
        <a href="?action=usersManagement">Gérer les utilisateurs.</a>
    </li>
</ul> -->
<h1>
    Panneau d'Administration
</h1>
<br>
<br>
<h2>Paramétrage du site</h2>
<hr>
<br>
<section class="uiAdmin">
    <a href="?action=motdManagement">
        <div class="cardAdmin">
            <div class="headCardAdmin">
                <img src="images/annouceIcon.png" alt="icone megaphone">
            </div>
            <div class="bodyCardAdmin">
                Message d'accueil.
            </div>
        </div>
    </a>
    <a href="?action=topHeaderManagement">
        <div class="cardAdmin">
            <div class="headCardAdmin">
                <img src="images/iconTopHeader.png" alt="icone">
            </div>
            <div class="bodyCardAdmin">
                Bandeau d'affichage.
            </div>
        </div>
    </a>
</section>
<h2>Gestion du site</h2>
<hr>
<br>
<section class="uiAdmin">
    <a href="?action=articlesManagement">
        <div class="cardAdmin">
            <div class="headCardAdmin">
                <img src="images/articleIcon.png" alt="icone journal">
            </div>
            <div class="bodyCardAdmin">
                Gérer les Articles.
            </div>
        </div>
    </a>
    <a href="?action=usersManagement">
        <div class="cardAdmin">
            <div class="headCardAdmin">
                <img src="images/iconUsers.png" alt="icone utilisateurs">
            </div>
            <div class="bodyCardAdmin">
                Gérer les Utilisateurs.
            </div>
        </div>
    </a>
    <a href="?action=tournoisManagement">
        <div class="cardAdmin">
            <div class="headCardAdmin">
                <img src="images/tournamentIcon.png" alt="icone chronomètre">
            </div>
            <div class="bodyCardAdmin">
                Gérer les Tournois.
            </div>
        </div>
    </a>
</section>