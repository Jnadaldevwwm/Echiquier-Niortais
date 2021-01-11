<?php
    $this->title = 'Gestion des articles';
?>
<h2 class='txtCenter'>Getion des articles</h2>
<table class='managementTable mAuto'>
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Auteur</td>
        <td>Date publication</td>
        <td>Action</td>
    </tr>
    <?php

    foreach($data['articles'] as $article){
        echo "<tr>
                <td>"
                    .$article['id'].
                "</td>
                <td>"
                    .$article['titre'].
                "</td>
                <td>"
                    .$article['auteur'].
                "</td>
                <td>"
                    .$article['date'].
                "</td>
                <td> 
                    <a href=''>
                        <i class='far fa-edit' title='Modifier'></i>
                    </a>
                    <a href=''>
                        <i class='fas fa-trash' title='Supprimer'></i>
                    </a>
                </td>";
    }
?>
    </tr>
</table>

<div id='buttonManagementAticle' class='txtCenter'>
    <a href="?action=newArticle">
        <i class="fas fa-plus-circle fa-2x"></i>
        Ajouter un article
    </a>
</div>
