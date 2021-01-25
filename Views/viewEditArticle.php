<?php
    $this->title = 'Modifier Article';
?>
<h1>Modifier l'article</h1>
<form enctype="multipart/form-data" action="?action=edit&idArticle=<?= $article['id'] ?>"id="formArticle" method="POST">
    <label for="titreArticle">Titre de l'article : </label>
    <input type="text" name="titreArticle" id="titreArticle" value="<?= $article['titre'] ?>">
    <input type="hidden" name="contentArticle" id="contentArticle">
    <div class="standalone-container">
        <div id="snow-container">
            <?= $article['contenu']?>
        </div>
    </div>
    <input type="submit" value="Modifier l'article">
</form>




<script src="scripts/quill.min.js"></script>
<script>
    var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [ 'link', 'image' ],          // add's image support
            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'align': [] }],

            ['clean']                                         // remove formatting button
        ];

    var quill = new Quill('#snow-container', {
        modules: {
            toolbar: toolbarOptions
        },
        placeholder: 'Ecrire un article...',
        theme: 'snow'
    });

    var formArticle = document.querySelector('#formArticle');
    formArticle.onsubmit = function(e){
        var contentArticle = document.querySelector('#contentArticle');
        contentArticle.value = quill.root.innerHTML;
        console.log(contentArticle.value);
    }
</script>