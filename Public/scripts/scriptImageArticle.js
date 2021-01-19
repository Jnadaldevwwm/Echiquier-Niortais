var zoneArticle = document.getElementById('contenuArticle');
var imageViewer = document.getElementById('imgViewer');
zoneArticle.addEventListener('click', function(e){
    if(e.target.nodeName=='IMG'){
        var image = e.target.cloneNode();
        imageViewer.appendChild(image);
        image.classList.add('apparitionImg')
        imageViewer.classList.remove('dNone');
        imageViewer.classList.add('dFlex');
        imageViewer.addEventListener('click', function(e){
            imageViewer.removeChild(image);
            imageViewer.classList.remove('dFlex');
            imageViewer.classList.add('dNone');
        })
    }
})