<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="togglingMenu" class='togglingMenu hidden'>
        <nav id='dynamicNav'>
            <ul>
                <li><a href="">Lien 1</a></li>
                <li><a href="">Lien 2</a></li>
                <li><a href="">Lien 3</a></li>
                <li><a href="">Lien 4</a></li>
            </ul>
        </nav>
</div>
    <header>
        <div id="topHeader">L'Echiquier Niortais - 49 rue de Ribray 7900 Niort - Tel : 06 85 57 74 60 - E-Mail : echiquiers.niortais@gmail.com</div>
        <div id="banner">
            <img src="images/logo.gif" alt="logo echiquier niortais">
        </div>
        <div id='navBar'>
            <div id="hamburger">=</div>
            <nav id='desktopNav'>
                <ul>
                    <li><a href="">Lien 1</a></li>
                    <li><a href="">Lien 2</a></li>
                    <li><a href="">Lien 3</a></li>
                    <li><a href="">Lien 4</a></li>
                </ul>
            </nav>
            <button>Connection</button>
        </div>
    </header>

    <section id="midContent">
        <main>
            <?= $content ?>
        </main>
        <aside>
            <div id="motd">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae ipsam totam quasi libero. Ad voluptates voluptatibus corporis tenetur quia molestias excepturi accusamus officiis velit. Quibusdam, asperiores. Maiores est quidem quod consequuntur beatae inventore dolorem nobis minus magnam eaque? Explicabo, dolor nam sapiente error repellendus eos tempore voluptatibus totam enim quae.
            </div>
        </aside>
    </section>
    <footer>
        Le footer
    </footer>
    <script src="scripts/script.js"></script>
</body>
</html>