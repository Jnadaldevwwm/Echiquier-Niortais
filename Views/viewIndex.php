<?php 
    $this->title = 'Accueil';

    ?>
    <h2 class='txtCenter'>Actualités</h2>
    <?php
    foreach ($articles as $article) {
        echo "<article class='cardArticle mAuto'>
                <div class='cardHeader'>
                <a href='?action=article&idArticle=".$article['id']."'>
                    <img src='images/uploads/".$article['image']."' alt='illustration article'>
                </a>
                </div>
                <div class='cardBody'>
                    <h3>".$article['titre']."</h3>
                    <span class='infoArticle txtCenter dBlock'>".$article['date']."</span>
                    <a href='?action=article&idArticle=".$article['id']."' class='lienArticle'>
                        <img src='images/uploads/".$article['image']."' alt='illustration article'>
                    </a>
                    <div class='resumeArticle'>".substr(preg_replace('/<[^>]*>/','',$article['contenu']),0,200)." ...</div>
                    <a href='?action=article&idArticle=".$article['id']."' class='lienArticle'>Voir plus</a>
                </div>
                </article>
        "; 
    }
    ?>
    <nav>
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($pagination['currentPage'] == 1) ? "dNone" : "" ?>">
                <a href="./?page=<?= $pagination['currentPage'] - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for($page = 1; $page <= $pagination['pages']; $page++): ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($pagination['currentPage'] == $page) ? "active" : "" ?>">
                    <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li class="page-item <?= ($pagination['currentPage'] == $pagination['pages']) ? "dNone" : "" ?>">
                <a href="./?page=<?= $pagination['currentPage'] + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>