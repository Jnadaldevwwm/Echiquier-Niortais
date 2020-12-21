const hamburger = document.getElementById('hamburger');
const togglingMenu = document.querySelector('.togglingMenu');
document.addEventListener('click',function(e){
    if(!togglingMenu.classList.contains('hidden')&&e.target.id!='dynamicNav'){
        togglingMenu.classList.remove('visible');
        togglingMenu.classList.remove('toggleNavAnimation');
        togglingMenu.classList.add('hidden');
    }
})
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