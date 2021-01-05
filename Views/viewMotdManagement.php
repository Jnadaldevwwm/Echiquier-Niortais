<?php
    $this->title = 'Message D\'annonce';
    ?>
    <h2 class='txtCenter'>Modifier le message d'annonce : </h2>
    <form action='?action=upMotd' method='POST' id='formMotd'>
        <label for="titreMotd">Titre message : </label>
        <input type="text" name="titreMotd" id="titreMotd" value="<?= $currentMotd['title'] ?>">
        <label for="contenuMotd">Contenu message : </label>
        <textarea name="contenuMotd" id="contenuMotd" cols="70" rows="15"><?= $currentMotd['content'] ?></textarea>
        <input type="submit" value="Modifier">
    </form>