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
                    <div class='resumeArticle'>".substr($article['contenu'],0,200)." ...</div>
                    <a href='?action=article&idArticle=".$article['id']."' class='lienArticle'>Voir plus</a>
                </div>
                </article>
        "; 
    }
    ?>
    <!-- <article class='cardArticle mAuto'>
        <h3>Titre article</h3>
        <img src="images/img.jpg" alt="">
        <div class='resumeArticle'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, iure? Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem itaque, deleniti enim ipsum maiores repellat.</div>
        <a href="" class='lienArticle'>Voir plus</a>
    </article> -->