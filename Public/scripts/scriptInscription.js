console.log('On y est')
var pswd1 = document.getElementById('pswd1');
var pswd2 = document.getElementById('pswd2');
var iconPassword = document.getElementById('iconPassword');
var iconValidation = document.getElementById('iconValid');
var pswdRegex = new RegExp('^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})');
var helpBox = document.getElementById('aideBoxPassword')
var inputSubmit = document.getElementById('submitButton')

pswd1.addEventListener('keyup', function(){
    if(iconValidation.classList.contains('dNone')){
        iconValidation.classList.remove('dNone');
    }
    if(pswdRegex.test(pswd1.value)){
        iconValidation.setAttribute('src','images/iconOk.png');
    } else {
        iconValidation.setAttribute('src','images/iconPasOk.png');
    }
})
pswd1.addEventListener('focus', function(){
    helpBox.classList.remove('dNone');
    helpBox.classList.add('dBlock');
})
pswd1.addEventListener('blur', function(){
    helpBox.classList.remove('dBlock');
    helpBox.classList.add('dNone');
})

pswd2.addEventListener('keyup', function(){
    if(iconPassword.classList.contains('dNone')){
        iconPassword.classList.remove('dNone');
    }
    if(pswd1.value != pswd2.value){
        iconPassword.setAttribute('src','images/iconPasOk.png');
    } else {
        iconPassword.setAttribute('src','images/iconOk.png');
    }
})

inputSubmit.addEventListener('click', function(e){
    if(pswd1.value != pswd2.value){
        e.preventDefault();
        alert('Le mots de passe doivent correspondre.');
    } else if (!pswdRegex.test(pswd1.value)){
        e.preventDefault();
        alert('Le mot de passe ne rempli pas les contraintes de validité.')
    } 
})