<section id="unArticle">
    <?php 
        $this->title = $article['titre'];
        ?>
        <h2><?= $article['titre'] ?></h2>
        <?php if($article['image']!='defaultPp.png'){
            echo '<img src="images/uploads/'.$article['image'].'" alt="">';
        }
        ?>
        <div class="contenuArticle">
            <?= $article['contenu']; ?>
        </div>
    
</section>