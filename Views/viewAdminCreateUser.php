<?php
    $this->title = 'Créer un utilisateur';
?>
<h1>Créer un nouvel utilisateur</h1>
<br>
<form enctype="multipart/form-data" action="?action=signIn" method="POST" id="formInscription">
    <label for="username">Nom d'utilisateur : </label>
    <input type="text" name="username" id="" placeholder="Nom d'utilisateur" autocomplete='off' required>
    <label for="nom">Nom : </label>
    <input type="text" name="nom" id="" placeholder="Nom" autocomplete='off' required>
    <label for="prenom">Prenom : </label>
    <input type="text" name="prenom" id="" placeholder="Prénom" autocomplete='off' required>
    <label for="email">E-Mail : </label>
    <input type="email" name="email" id="email" placeholder="Adresse mail">
    <label for="permission">Permission : </label>
    <select name="permission" id="">
        <option value="3">Utilisateur</option>
        <option value="2">Rédacteur</option>
        <option value="">Administrateur</option>
    </select>
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
    <input type="submit" value="Créer utilisateur" id='submitButtonSignIn'>
</form>

<script src="scripts/scriptInscription.js"></script>