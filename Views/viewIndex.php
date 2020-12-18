<?php 
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
    $this->title = 'Accueil';

    ?>
    <h2 class='txtCenter'>Actualités</h2>
    <?php
    foreach ($articles as $article) {
        echo "<article class='cardArticle mAuto'>
                <h3>".$article['titre']."</h3>
                <span class='infoArticle txtCenter dBlock'>".$article['date']."</span>
                <img src='images/".$article['image']."' alt=''>
                <div class='resumeArticle'>".substr($article['contenu'],0,200)." ...</div>
                <a href='' class='lienArticle'>Voir plus</a>
                </article>
        "; 
        console_log($article['date']);
    }
    ?>
    <article class='cardArticle mAuto'>
        <h3>Titre article</h3>
        <img src="images/img.jpg" alt="">
        <div class='resumeArticle'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, iure? Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem itaque, deleniti enim ipsum maiores repellat.</div>
        <a href="" class='lienArticle'>Voir plus</a>
    </article>