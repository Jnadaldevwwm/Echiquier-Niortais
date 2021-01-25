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
                    .$article['prenomAuteur'].
                "</td>
                <td>"
                    .$article['date'].
                "</td>
                <td> 
                    <a href=''>
                        <i class='far fa-edit' title='Modifier'></i>
                    </a>
                    <a href='?action=deleteArticle&idArticle=".$article['id']."' class='bDelete' data-id=".$article['id'].">
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
<nav>
        <ul class="pagination">
    <?php
        $links = "";
        $current_page = $pagination['currentPage'];
        $total_pages = $pagination['pages'];
        if ($total_pages > 1 && $current_page <= $total_pages) {
            $links .= "<li><a href=\"?action=articlesManagement&page=1\">1</a></li>";
            $i = max(2, $current_page - 5);
            if ($i > 2)
                $links .= " ... ";
            for (; $i < min($current_page + 6, $total_pages); $i++) {
                $links .= "<li><a href=\"?action=articlesManagement&page={$i}\">{$i}</a></li>";
            }
            if ($i != $total_pages)
                $links .= " ... ";
            $links .= "<li><a href=\"?action=articlesManagement&page={$total_pages}\">{$total_pages}</a></li>";
        }
        echo $links;
?>
        </ul>
    </nav>
<script src="scripts/scriptArticleManag.js"></script>