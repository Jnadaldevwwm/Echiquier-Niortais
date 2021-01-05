<?php

    ?>
    <h2 class='txtCenter'>Créer un compte : </h2>
    <form action="?action=signIn" method="POST" id="formInscription">
        <input type="text" name="username" id="" placeholder="Nom d'utilisateur" autocomplete='off' required>
        <input type="text" name="nom" id="" placeholder="Nom" autocomplete='off' required>
        <input type="text" name="prenom" id="" placeholder="Prénom" autocomplete='off' required>
        <div id='boxMdp1'>
            <div id='aideBoxPassword' class='dNone'>Le mot de passe doit contenir :
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
        <div>
            <input type="password" name="password" id="pswd2" placeholder="Confirmer le mot de passe" required>
            <img src="" alt="icone status" class='dNone iconSignIn' id="iconPassword">
        </div>
        <label for="avatar">Image de profil : </label>
        <input type="file" name="avatar" id="avatar">
        <input type="submit" value="S'inscrire" id='submitButton'>
    </form>

    <script src="scripts/scriptInscription.js"></script>