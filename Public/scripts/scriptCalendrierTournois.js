const zoneCalendrier = document.getElementById('zoneCalendrier'); // On récupère la zone où doit se situer le calendrier
var zoneJours = document.createElement('div'); // Création de la zone où seront affichés les jours
zoneJours.classList.add('zoneJours');
var currentDate = new Date();
var nbrJours = 0;
var flecheGauche = document.createElement('div');
var entete = document.createElement('div');
entete.classList.add('enteteCalendrier');
flecheGauche.classList.add('goGauche');
getEntete(currentDate,entete);
zoneCalendrier.appendChild(entete);
zoneCalendrier.appendChild(flecheGauche);
zoneCalendrier.appendChild(zoneJours);

var getDaysInMonth = function(month,year) {
   return new Date(year, month, 0).getDate();
};

// Récupération AJAX des tournois en bdd //
var ajRequete = new XMLHttpRequest();
ajRequete.onload = function(){
    lesTournois = this.responseText;    // Récupération de tout les tournois
    getJours(currentDate,zoneJours,lesTournois);
    document.addEventListener('click', function(e){
        if(e.target.classList.value !==''){
            if(e.target.classList.contains('goDroite')){
                var mois = currentDate.getMonth()+1;
                currentDate.setMonth(mois);
                deleteJours(zoneJours);
                getJours(currentDate,zoneJours,lesTournois);
                getEntete(currentDate,entete);
            }
            if(e.target.classList.contains('goGauche')){
                var mois = currentDate.getMonth()-1;
                console.log(mois)
                currentDate.setMonth(mois);
                deleteJours(zoneJours);
                getJours(currentDate,zoneJours,lesTournois);
                getEntete(currentDate,entete);
            }
        }
    })
}
ajRequete.open("get","?action=getTournois");
ajRequete.send();
console.log(ajRequete.responseText)




// Fonction création entete 'Janvier 2021' par exemple
function getEntete(currentDate,zoneEntete){
    var mois = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];
    var entete = document.createElement('div');
    entete.classList.add('enteteDate');
    entete.textContent = mois[currentDate.getMonth()] + ' ' + currentDate.getFullYear();
    if(zoneEntete.lastElementChild){
        zoneEntete.removeChild(zoneEntete.lastElementChild);
    }
    zoneEntete.appendChild(entete);
}
// Fonction suppression des jours affichés
function deleteJours(zoneJours){
    while(zoneJours.lastElementChild){
        zoneJours.removeChild(zoneJours.lastElementChild);
    }
}
// Fonction création et affichage des jours du moi
function getJours(currentDate,zoneJours,tournois){
    var parsedTournois = JSON.parse(tournois);
    nbrJours = getDaysInMonth(currentDate.getMonth(),currentDate.getFullYear());
    var jours = ['Dim','Lun','Mar','Mer','Jeu','Vend','Sam'];

    for(let i = 1; i<=nbrJours; i++){
        var date = new Date(currentDate.getFullYear(),currentDate.getMonth(),i);
        var jour = document.createElement('div');
        var jourHead = document.createElement('div');
        var jourBody = document.createElement('div');
        jourHead.classList.add('jourHead');
        jourBody.classList.add('jourBody');
        jour.classList.add('jour');
        if(date.getMonth().toString().length <= 1){
            var mois = '0'+(date.getMonth()+1);
        }
        var dateJour = date.getFullYear()+'-'+mois+'-'+date.getDate();
        parsedTournois.forEach(tournoi => {
            if(dateJour == tournoi.date_debut){
                jour.classList.add('yatournoi');
            }
        });

        jour.setAttribute('id', dateJour);
        jourHead.textContent = date.getDate();
        jourBody.textContent = jours[date.getDay()];

        jour.appendChild(jourHead);
        jour.appendChild(jourBody);
        zoneJours.appendChild(jour);
    }
}
var flecheDroite = document.createElement('div');
flecheDroite.classList.add('goDroite');
zoneCalendrier.appendChild(flecheDroite);

// Les events en fonction de la class de la target
document.addEventListener('click', function(e){
    if(e.target.classList.value !==''){
        if(e.target.parentNode.classList.contains('jour')){
            if(document.getElementById('zoneInputs')){
                document.getElementById('zoneInputs').remove();
            }
            var zoneInputs = document.createElement('section');

            var tabDateExplicit = e.target.parentNode.id.split('-');
            var dateExplicit = tabDateExplicit[2] + '/' + tabDateExplicit[1] + '/' + tabDateExplicit[0];
            zoneInputs.setAttribute('id', 'zoneInputs');
            // Titre de la zone
            var titre = document.createElement('h3');
            titre.textContent = 'Créer un tournois pour le '+dateExplicit;
            titre.classList.add('calTitreh3');
            zoneInputs.appendChild(titre);
            // Formulaire ///////
            var formTournois = document.createElement('form');
            formTournois.setAttribute('action','?action=addTournoi');
            formTournois.setAttribute('method','POST');
            formTournois.classList.add('formTournois');
            // Inputs ///////
            // Nom //
            var inNomTournois = document.createElement('input');
            inNomTournois.setAttribute('type','text');
            inNomTournois.setAttribute('name','nomTournoi');
            inNomTournois.setAttribute('required','');
            var labelInNomTournois = document.createElement('label');
            labelInNomTournois.setAttribute('for','nomTournoi');
            labelInNomTournois.textContent = 'Nom du tournoi : ';
            // nbPlaces //
            var inNbPlacesTournois = document.createElement('input');
            inNbPlacesTournois.setAttribute('type','number');
            inNbPlacesTournois.setAttribute('name','nbPlaces');
            inNbPlacesTournois.setAttribute('required','');
            var labelInNbPlacesTournois = document.createElement('label');
            labelInNbPlacesTournois.setAttribute('for','nbPlaces');
            labelInNbPlacesTournois.textContent = 'Nombre de places : ';
            // Date de fin //
            var inDateFinTournois = document.createElement('input');
            inDateFinTournois.setAttribute('type','date');
            inDateFinTournois.setAttribute('name','dateFinTournoi');
            inDateFinTournois.setAttribute('value', e.target.parentNode.id);
            var labelInDateFinTournois = document.createElement('label');
            labelInDateFinTournois.setAttribute('for','dateFinTournoi');
            labelInDateFinTournois.textContent = 'Date fin de tournoi : ';
            // Date début caché //
            var inDateDebut = document.createElement('input');
            inDateDebut.setAttribute('type','hidden');
            inDateDebut.setAttribute('name','dateDebutTournoi');
            inDateDebut.setAttribute('value',e.target.parentNode.id);
            // Type tournoi //
            var inTypeTournois = document.createElement('select');
            inTypeTournois.setAttribute('name','typeTournoi');
            var optionType1 = document.createElement('option');
            optionType1.setAttribute('value','type1');
            optionType1.textContent = 'Type tournoi 1';
            var optionType2 = document.createElement('option');
            optionType2.setAttribute('value','type2');
            optionType2.textContent = 'Type tournoi 2';
            var optionType3 = document.createElement('option');
            optionType3.setAttribute('value','type3');
            optionType3.textContent = 'Type tournoi 3';
            inTypeTournois.appendChild(optionType1);
            inTypeTournois.appendChild(optionType2);
            inTypeTournois.appendChild(optionType3);
            var labelInTypeTournoi = document.createElement('label');
            labelInTypeTournoi.setAttribute('for','typeTournoi');
            labelInTypeTournoi.textContent = 'Type de tournoi : ';
            // Info complémentaires //
            var textEditorTournoiParent = document.createElement('div');
            textEditorTournoiParent.classList.add('standalone-container2')
            var textEditorTournoiChild = document.createElement('div');
            textEditorTournoiChild.setAttribute('id','snow-container2');
            textEditorTournoiParent.appendChild(textEditorTournoiChild)
            var hiddenContent = document.createElement('input');
            hiddenContent.setAttribute('type','hidden');
            hiddenContent.setAttribute('name','content');
            var labelHiddenContent = document.createElement('label');
            labelHiddenContent.setAttribute('for','content');
            labelHiddenContent.textContent = 'Info complémentaires : ';
            // Submit boutton //
            var submitTournoi = document.createElement('input');
            submitTournoi.setAttribute('type','submit');
            submitTournoi.setAttribute('value','Enregister le tournoi');


            formTournois.appendChild(labelInNomTournois);
            formTournois.appendChild(inNomTournois);
            formTournois.appendChild(labelInNbPlacesTournois);
            formTournois.appendChild(inNbPlacesTournois);
            formTournois.appendChild(labelInDateFinTournois);
            formTournois.appendChild(inDateFinTournois);
            formTournois.appendChild(inDateDebut);
            formTournois.appendChild(labelInTypeTournoi);
            formTournois.appendChild(inTypeTournois);
            formTournois.appendChild(labelHiddenContent);
            formTournois.appendChild(hiddenContent);
            formTournois.appendChild(textEditorTournoiParent);
            formTournois.appendChild(submitTournoi);

            zoneInputs.appendChild(formTournois);
            zoneCalendrier.appendChild(zoneInputs);

            var quill = new Quill('#snow-container2', {
                modules: {
                    toolbar: toolbarOptions
                },
                placeholder: 'Ecrire un article...',
                theme: 'snow'
            });
            
        }
    }
})


