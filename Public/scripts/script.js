const hamburger = document.getElementById('hamburger');
const togglingMenu = document.querySelector('.togglingMenu');
const connButton = document.getElementById('connButton');

hamburger.addEventListener('click', function(e){
    e.stopPropagation();
    if(togglingMenu.classList.contains('hidden')){
        togglingMenu.classList.remove('hidden');
        togglingMenu.classList.add('visible');
        togglingMenu.classList.add('toggleNavAnimation');
    } else {
        togglingMenu.classList.remove('visible');
        togglingMenu.classList.remove('toggleNavAnimation');
        togglingMenu.classList.add('hidden');
    }
})

const buttonProfil = document.querySelector('.roundAvatar');
const menuProfil = document.querySelector('.menuProfil');
buttonProfil.addEventListener('click', function(e){
    e.stopPropagation();
    if(menuProfil.classList.contains('hidden')){
        menuProfil.classList.remove('hidden');
        menuProfil.classList.add('visible');
        menuProfil.classList.add('toggleProfilNavAnimation');
    } else {
        menuProfil.classList.remove('visible');
        menuProfil.classList.remove('toggleProfilNavAnimation');
        menuProfil.classList.add('hidden');
    }
})
document.addEventListener('click',function(e){
    if(!togglingMenu.classList.contains('hidden')&&e.target.id!='dynamicNav'){
        togglingMenu.classList.remove('visible');
        togglingMenu.classList.remove('toggleNavAnimation');
        togglingMenu.classList.add('hidden');
    }
    if(!menuProfil.classList.contains('hidden')&&!e.target.classList.contains('menuProfil')){
        menuProfil.classList.remove('visible');
        menuProfil.classList.remove('toggleProfilNavAnimation');
        menuProfil.classList.add('hidden');
    }
})