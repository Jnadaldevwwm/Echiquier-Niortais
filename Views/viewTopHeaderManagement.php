<?php
    $this->title = "Gestion bandeau d'affichage";
    ?>

   <h1>Modification du bandeau d'annonce</h1>
   <br>
   <form action="" method="POST" class="dFlex flexCol flexAlignCenter">
   <label for="contenu">Contenu du bandeau : </label>
        <textarea name="contenu" id="contTH" cols="30" rows="10">
            <?= $currentTopHeader['content'] ?>
        </textarea>
        <input type="submit" value="Modifier">
   </form>