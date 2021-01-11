<?php
    $this->title = 'Nouvel Article';
?>

LE NOUVEL ARTICLE
<form action="?action=addArticle"id="formArticle" method="POST">
    <label for="titreArticle">Titre de l'article : </label>
    <input type="text" name="titreArticle" id="titreArticle" placeholder="titre">
    <label for="imageEntete">Image d'illustration : </label>
    <input type="file" name="imageEntete" id="imageEntete">
    <input type="hidden" name="contentArticle" id="contentArticle">
    <div class="standalone-container">
        <div id="snow-container"></div>
    </div>
    <input type="submit" value="Ajouter un article">
</form>




<script src="scripts/quill.min.js"></script>
<script>
    var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
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
        contentArticle.value = JSON.stringify(quill.getContents());
        console.log(contentArticle.value);
    }
</script>