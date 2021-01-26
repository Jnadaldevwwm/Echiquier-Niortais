<?php
    $this->title = 'Création de tournoi';
?>
<section id="tournoiCalendrier">
    <div id="zoneCalendrier"></div>
</section>




<script src="scripts/scriptCalendrierTournois.js"></script>
<script src="scripts/quill.min.js"></script>
<script>
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        [ 'link' ],          // add's image support
        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'align': [] }],
    ];

</script>