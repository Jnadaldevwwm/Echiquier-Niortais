var deleteButton = document.querySelectorAll('.bDelete');
deleteButton.forEach(button => {
    button.addEventListener('click', function(e){
        e.preventDefault();
        var id = button.dataset.id;
        var action = confirm('Voulez-vous supprimer l\'utilisateur ?');
        if(action == true){
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = function(){

            }
            httpRequest.open('GET','index.php?action=deleteUser&userId='+id);
            httpRequest.send();
            window.location.href = window.location.href + "&statusUser=deleted";
        }
    })
});
