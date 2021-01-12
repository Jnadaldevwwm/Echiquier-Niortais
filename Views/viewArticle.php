<?php 
    $this->title = $article['titre'];
    ?>
    <h2><?= $article['titre'] ?></h2>
    <img src="images/uploads/<?=$article['image']?>" alt="">

<?php    
    echo $article['contenu'];
    // require '../vendor/autoload.php';
    // $quill = new \DBlackborough\Quill\Render($article['contenu']);
    // $result = $quill->render();
    // echo $result;
    // //render($article['content']);
    ?>