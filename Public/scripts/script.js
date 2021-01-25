const hamburger = document.getElementById('hamburger');
const togglingMenu = document.querySelector('.togglingMenu');
const connButton = document.getElementById('connButton');

hamburger.addEventListener('click', function(e){
    e.stopPropagation();
    if(togglingMenu.classList.contains('hidden')){
        hamburger.classList.add('open')
        togglingMenu.classList.remove('hidden');
        togglingMenu.classList.add('visible');
        togglingMenu.classList.add('toggleNavAnimation');
        togglingMenu.classList.remove('untoggleNavAnimation');
    } else {
        hamburger.classList.remove('open')
        togglingMenu.classList.remove('visible');
        togglingMenu.classList.remove('toggleNavAnimation');
        togglingMenu.classList.add('untoggleNavAnimation');
        var to = setTimeout(function(){togglingMenu.classList.add('hidden')},1000);
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
        menuProfil.classList.remove('untoggleProfilNavAnimation');
    } else {
        menuProfil.classList.remove('visible');
        menuProfil.classList.remove('toggleProfilNavAnimation');
        menuProfil.classList.add('untoggleProfilNavAnimation');
        var to = setTimeout(function(){menuProfil.classList.add('hidden')},1000)
            ;
    }
})}
document.addEventListener('click',function(e){
    if(togglingMenu!=null){
        if(!togglingMenu.classList.contains('hidden')&&e.target.id!='dynamicNav'&&e.target.id!='presentation'){
            hamburger.classList.remove('open')
            togglingMenu.classList.remove('visible');
            togglingMenu.classList.remove('toggleNavAnimation');
            togglingMenu.classList.add('untoggleNavAnimation');
            var to = setTimeout(function(){togglingMenu.classList.add('hidden')},1000);
        }
    }
    if(menuProfil!=null){
        if(!menuProfil.classList.contains('hidden')&&!e.target.classList.contains('menuProfil')){
            menuProfil.classList.remove('visible');
            menuProfil.classList.remove('toggleProfilNavAnimation');
            menuProfil.classList.add('untoggleProfilNavAnimation');
            var to = setTimeout(function(){menuProfil.classList.add('hidden')},1000)
            ;
        } 
    }
})

const navPresentation = document.getElementById('navPres');
const presDisplay = document.getElementById('presDisplay');
navPresentation.addEventListener('mouseenter', function(){
    console.log('entre')
    presDisplay.classList.remove('hidden');
    presDisplay.classList.add('visible');
    function fonctionListenMouse(e){
        console.log(e.target.id)
        if(e.target.id != 'navPres' && e.target.id != 'presDisplay' && e.target.parentNode.id != 'presDisplay' && e.target.parentNode.parentNode.id != 'presDisplay'){
            presDisplay.classList.remove('visible');
            presDisplay.classList.add('hidden');
            document.removeEventListener('mousemove', fonctionListenMouse);
    }}
    document.addEventListener('mousemove', fonctionListenMouse)
})
navPresentation.addEventListener('click', function(e){
    e.preventDefault();
    console.log('click')
})

const smartPresentation = document.getElementById('presentation');
const menuSmartPresentation = document.getElementById('presSmart');
smartPresentation.addEventListener('click', function(e){
    e.preventDefault();
    if(menuSmartPresentation.classList.contains('dNone')){
        menuSmartPresentation.classList.remove('dNone');
        menuSmartPresentation.classList.add('dFlex'); 
    } else if(menuSmartPresentation.classList.contains('dFlex')){
        menuSmartPresentation.classList.remove('dFlex');
        menuSmartPresentation.classList.add('dNone'); 
    }
    
})