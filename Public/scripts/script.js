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

const buttonProfil = document.getElementById('isConn');
const menuProfil = document.querySelector('.menuProfil');
if(buttonProfil!=null){
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
})}
document.addEventListener('click',function(e){
    if(togglingMenu!=null){
        if(!togglingMenu.classList.contains('hidden')&&e.target.id!='dynamicNav'){
            togglingMenu.classList.remove('visible');
            togglingMenu.classList.remove('toggleNavAnimation');
            togglingMenu.classList.add('hidden');
        }
    }
    if(menuProfil!=null){
        if(!menuProfil.classList.contains('hidden')&&!e.target.classList.contains('menuProfil')){
            menuProfil.classList.remove('visible');
            menuProfil.classList.remove('toggleProfilNavAnimation');
            menuProfil.classList.add('hidden');
        } 
    }
})

const navPresentation = document.getElementById('navPres');
const presDisplay = document.getElementById('presDisplay');
navPresentation.addEventListener('mouseenter', function(){
    console.log('entre')
    presDisplay.classList.remove('hidden');
    presDisplay.classList.add('visible');
    document.addEventListener('mousemove', function(e){
        if(e.target.id != 'navPres' && e.target.id != 'presDisplay' && e.target.parentNode.id != 'presDisplay' && e.target.parentNode.parentNode.id != 'presDisplay'){
            presDisplay.classList.remove('visible');
            presDisplay.classList.add('hidden');
        }
    })
})
// navPresentation.addEventListener('mouseleave', function(){
//     console.log('leave')
//     presDisplay.classList.remove('visible');
//     presDisplay.classList.add('hidden');
// })
navPresentation.addEventListener('click', function(e){
    e.preventDefault();
    console.log('click')
})