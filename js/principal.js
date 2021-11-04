document.querySelectorAll('.actions-compte span').forEach(function(btnSpan) {
    btnSpan.addEventListener('click', function() {
        this.closest('form').classList.remove('frm-affiche');
        document.querySelector('form.' + this.dataset.formulaire).classList.add('frm-affiche');
    });
});


/*
document.querySelectorAll('.actions-compte span').forEach(function(btnSpan) {
    btnSpan.addEventListener('click', afficherFormulaire);
});

function afficherFormulaire() {
    this.closest('form').classList.remove('frm-affiche');
    document.querySelector('form.' + this.dataset.formulaire).classList.add('frm-affiche');
}
*/
/*
let tousLesBoutons = document.querySelectorAll('.actions-compte span');
//console.log("Tous les boutons : ", tousLesBoutons)
tousLesBoutons.forEach(function(btnSpan) {
    btnSpan.addEventListener('click', afficherFormulaire);
});
*/

/*
let btnNouveau = document.querySelector('span.btn-nouveau');
let btnMdp = document.querySelector('span.btn-mdp');
let btnConnexion = document.querySelector('span.btn-connexion');

if(btnNouveau && btnMdp && btnConnexion) {
    btnNouveau.addEventListener('click', afficherFormulaire);
    btnMdp.addEventListener('click', afficherFormulaire);
    btnConnexion.addEventListener('click', afficherFormulaire);
}
*/


// console.log("Accès aux attributs 'data' : ", document.querySelector("ul.liste-test li:first-child").dataset.infoimportante);