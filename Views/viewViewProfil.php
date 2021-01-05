<?php   
    $this->title = 'Profil de '.$user['prenom'];
    ?>
    <h2 class="txtCenter">Mon profil :</h2>
    <?php
        if(isset($_GET['statusUpdate'])&&$_GET['statusUpdate']=='login'){
            echo '<div id="updtStat" class="errorStat txtCenter">LOGIN EXISTE DEJA</div>';
        } else if(isset($_GET['statusUpdate'])&&$_GET['statusUpdate']=='OK'){
            echo '<div id="updtStat" class="successStat txtCenter">PROFIL MIS A JOUR</div>';
        } else if(isset($_GET['statusUpdate'])&&$_GET['statusUpdate']=='upload'){
            echo '<div id="updtStat" class="errorStat txtCenter">Erreur lors de la mise à jour de l\'avatar : <br>'.$_GET['messageScript'].'</div>';
        }

    ?>
    <form enctype="multipart/form-data" id="formProfil" action="?action=updateProfil" method="POST" >
        <label for="login">Nom d'utilisateur :</label>
        <input type="text" name="login" id="login" value="<?= $user['login'] ?>" autocomplete="off">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= $user['prenom'] ?>" autocomplete="off">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= $user['nom'] ?>" autocomplete="off">
        <label for="avatar">Image de profil :</label>
        <img src="images/uploads/<?= $user['avatar'] ?>" alt="">
        <input type="file" name="avatar" id="avatar">
        <input type="submit" value="Mettre à jours le profil">
    </form>