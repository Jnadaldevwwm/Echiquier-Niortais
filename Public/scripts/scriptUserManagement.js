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

// const formRoleUser = document.querySelectorAll('.selectRoleUser');
// formRoleUser.forEach(roleUser => {
//     roleUser.addEventListener('focus',function(){
//         var previousValue = roleUser.value;
//         console.log(previousValue)
//         roleUser.addEventListener('change', function(e){
//             e.preventDefault();
//             var action = confirm('Voulez-vous changer le role de l\'utilisateur ?');
//             if(action== true){
    
//             } else {
//                 console.log(previousValue)
//                 roleUser.value = previousValue;
//             }
//         })
//     })
// })

const formRoleUser = document.querySelectorAll('.selectRoleUser');
formRoleUser.forEach(roleUser => {
    roleUser.dataset.prev = roleUser.value;
    roleUser.addEventListener('change', function(e){
        e.preventDefault();
        var action = confirm('Voulez-vous changer le role de l\'utilisateur ?');
        if(action== true){

        } else {
            roleUser.value = roleUser.dataset.prev;
        }
    })

})


