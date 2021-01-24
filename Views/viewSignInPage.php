<?php
    if(isset($_GET['statusUpdate'])&&$_GET['statusUpdate']=='upload'){
            echo '<div id="updtStat" class="errorStat txtCenter">Erreur lors de la mise à jour de l\'avatar : <br>'.$_GET['messageScript'].'</div>';
        }
    ?>
    <h1 class='txtCenter'>Créer un compte : </h1>
    <br><br>
    <form enctype="multipart/form-data" action="?action=signIn" method="POST" id="formInscription">
        <label for="email">E-Mail : </label>
        <input type="email" name="email" id="email">
        <label for="username">Nom d'utilisateur : </label>
        <input type="text" name="username" id="" placeholder="Nom d'utilisateur" autocomplete='off' required>
        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="" placeholder="Nom" autocomplete='off' required>
        <label for="prenom">Prenom : </label>
        <input type="text" name="prenom" id="" placeholder="Prénom" autocomplete='off' required>
        <label for="password">Mot de passe : </label>
        <div id='boxMdp1'>
            <div id='aideBoxPassword' class='dNone'>Le mot de passe doit contenir : <br>
                8 caractères minimum <br> 
                au moins 1 majuscule <br>
                au moins 1 minuscule <br>
                au moins 1 chiffre <br>
                au moins 1 caractère spécial (!, @, #, %...)
            </div>
            <div>
                <input type="password" name="password" id="pswd1" placeholder="Mot de passe" required>
                <img src="" alt="icone validite" class="dNone iconSignIn" id="iconValid">
            </div>
        </div>
        <label for="password">Confirmez le mot de passe : </label>
        <div>
            <input type="password" name="password" id="pswd2" placeholder="Confirmer le mot de passe" required>
            <img src="" alt="icone status" class='dNone iconSignIn' id="iconPassword">
        </div>
        <label for="avatar">Image de profil <i>(800x800 pixels max)</i>: </label>
        <input type="file" name="avatar" id="avatar">
        <input type="submit" value="S'inscrire" id='submitButtonSignIn'>
    </form>

    <script src="scripts/scriptInscription.js"></script>