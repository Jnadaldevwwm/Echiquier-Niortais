<section id="unArticle">
    <?php 
        $this->title = $article['titre'];
        ?>
        <h1><?= $article['titre'] ?></h1>
        <?php if($article['image']!='defaultPp.png'){
            echo '<img src="images/uploads/'.$article['image'].'" alt="">';
        }
        ?>
        <div id="contenuArticle">
            <?= $article['contenu']; ?>
        </div>
        <div id='imgViewer' class='dNone'></div>
</section>

<script src="scripts/scriptImageArticle.js"></script>