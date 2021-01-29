<?php
    $this->title = 'Gestion des Utilisateurs';
    if(isset($_GET['statusUser'])){
        switch ($_GET['statusUser']){
            case 'deleted':
                echo '<div id="updtStat" class="successStat txtCenter">Utilisateur supprimé</div>';
                break;
            case 'role':
                echo '<div id="updtStat" class="successStat txtCenter">Permissions mises à jour</div>';
                break;
        }
    }
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
                <td>
                    {$user['id']}
                </td>
                <td>
                    {$user['login']}
                </td>
                <td>
                    {$user['prenom']}
                </td>
                <td>
                    {$user['nom']}
                </td>
                <td>
                    <form action='' method='POST' class='formRoleUser'>
                        <select name='roleUser' class='selectRoleUser' data-id={$user['id']} >
                            <option value=1 ".($user['name']=='Administrateur'?'selected="selected"':'').">Administrateur</option>
                            <option value=2 ".($user['name']=='Rédacteur'?'selected="selected"':'').">Rédacteur</option>
                            <option value=3 ".($user['name']=='Membre'?'selected="selected"':'').">Membre</option>
                        </select
                    </form>
                </td>
                <td> 
                    <a href=''>
                        <i class='far fa-edit' title='Modifier'></i>
                    </a>
                    <a href='' class='bDelete' data-id={$user['id']}>
                        <i class='fas fa-trash' title='Supprimer'></i>
                    </a>
                </td>";
    }
?>
    </tr>
</table>

<div id='buttonManagementAticle' class='txtCenter'>
    <a href="?action=adminCreateUserPage">
        <i class="fas fa-plus-circle fa-2x"></i>
        Ajouter un utilisateur
    </a>
</div>

<script src="scripts/scriptUserManagement.js"></script>