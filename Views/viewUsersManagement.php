<?php
    $this->title = 'Gestion des Utilisateurs';
?>
<h2 class='txtCenter'>Getion des utilisateurs</h2>
<table class='managementTable mAuto'>
    <tr>
        <td>Id</td>
        <td>Nom Utilisateur</td>
        <td>Prénom</td>
        <td>Nom</td>
        <td>Permission</td>
        <td>Action</td>
    </tr>
    <?php

    foreach($data['users'] as $user){
        echo "<tr>
                <td>"
                    .$user['id'].
                "</td>
                <td>"
                    .$user['login'].
                "</td>
                <td>"
                    .$user['prenom'].
                "</td>
                <td>"
                    .$user['nom'].
                "</td>
                <td>"
                    .$user['denomination'].
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
    <a href="">
        <i class="fas fa-plus-circle fa-2x"></i>
        Ajouter un utilisateur
    </a>
</div>
