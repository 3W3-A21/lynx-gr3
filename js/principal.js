let btnNouveau = document.querySelector('span.btn-nouveau');

//console.log('Avec parentNode : ', btnNouveau.parentNode.parentNode);

//console.log('Avec closest() : ', btnNouveau.closest('form'));

btnNouveau.addEventListener('click', afficherFormulaireNouveauCompte);

function afficherFormulaireNouveauCompte() {
    //console.log('Dans la fonction, this : ', this);
    //console.log('ClassList du formulaire (avant) : ', this.closest('form').classList);
    // Retirer la classe 'frmAffiche' du formulaire le plus proche du bouton cliqué
    this.closest('form').classList.remove('frmAffiche');
    //console.log('ClassList du formulaire (après) : ', this.closest('form').classList);
    // Afficher le formulaire de création de compte
    document.querySelector('form.frmNouveau').classList.add('frmAffiche');
}