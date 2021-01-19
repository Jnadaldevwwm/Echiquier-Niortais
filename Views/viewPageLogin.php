<?php   
    $this->title = 'Connection';
    ?>
    <h1 class='txtCenter'>Se connecter : </h1>
    <div id='formLogin' class='mAuto'>
        <?php
            if(isset($data['error'])&&$data['error']!=false ){
                echo "<div id='msgError'>".$data['error']."
                </div>";
            }
        ?>
        
        <form action="?action=signUp" method="POST">
            <label for="login">Nom d'utilisateur : </label>
            <input type="text" name="login" id="login" autocomplete='off' required>
            <label for="mdp">Mot de passe : </label>
            <input type="password" name="mdp" id="mdp" required>
            <input type="submit" value="Connection" class='mAuto'>
        </form>
        <br>
        <span class='txtCenter'>
        Pas encore inscrit ? <a href="?action=signInPage">s'inscrire.</a>
        </span>
    </div>