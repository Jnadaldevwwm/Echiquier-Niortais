<?php 
    $this->title = 'Accueil';

    ?>
    <h2 class='txtCenter'>Actualités</h2>
    <?php
    foreach ($articles as $article) {
        echo "<article class='cardArticle mAuto'>
                <div class='cardHeader'>
                <a href='?action=article&idArticle={$article['id']}'>
                    <img src='images/uploads/{$article['image']}' alt='illustration article'>
                </a>
                </div>
                <div class='cardBody'>
                    <h3>".$article['titre']."</h3>
                    <span class='infoArticle txtCenter dBlock'>{$article['date']} par {$article['prenomAuteur']} {$article['nomAuteur']}</span>
                    <a href='?action=article&idArticle={$article['id']}' class='lienArticle'>
                        <img src='images/uploads/{$article['image']}' alt='illustration article'>
                    </a>
                    <div class='resumeArticle'>".substr(preg_replace('/<[^>]*>/','',$article['contenu']),0,200)." ...</div>
                    <a href='?action=article&idArticle={$article['id']}' class='lienArticle'>Voir plus</a>
                </div>
                </article>
        "; 
    }
    ?>
     <nav>
        <ul class="pagination">
    <?php
        $links = "";
        $current_page = $pagination['currentPage'];
        $total_pages = $pagination['pages'];
        if ($total_pages >= 1 && $current_page <= $total_pages) {
            $links .= "<li><a href=\"?page=1\">1</a></li>";
            $i = max(2, $current_page - 5);
            if ($i > 2)
                $links .= " ... ";
            for (; $i < min($current_page + 6, $total_pages); $i++) {
                $links .= "<li><a href=\"?page={$i}\">{$i}</a></li>";
            }
            if ($i != $total_pages)
                $links .= " ... ";
            $links .= "<li><a href=\"?page={$total_pages}\">{$total_pages}</a></li>";
        }
        echo $links;
?>