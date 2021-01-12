<?php 
    $this->title = 'Accueil';

    ?>
    <h2 class='txtCenter'>Actualités</h2>
    <?php
    foreach ($articles as $article) {
        echo "<article class='cardArticle mAuto'>
                <div class='cardHeader'>
                <a href='?action=article&idArticle=".$article['id']."'>
                    <img src='images/".$article['image']."' alt='illustration article'>
                </a>
                </div>
                <div class='cardBody'>
                    <h3>".$article['titre']."</h3>
                    <span class='infoArticle txtCenter dBlock'>".$article['date']."</span>
                    <a href='?action=article&idArticle=".$article['id']."' class='lienArticle'>
                        <img src='images/".$article['image']."' alt='illustration article'>
                    </a>
                    <div class='resumeArticle'>".substr(preg_replace('/<[^>]*>/','',$article['contenu']),0,200)." ...</div>
                    <a href='?action=article&idArticle=".$article['id']."' class='lienArticle'>Voir plus</a>
                </div>
                </article>
        "; 
    }
    ?>