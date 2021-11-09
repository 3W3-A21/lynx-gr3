// Gérer l'affichage des formulaires de gestion d'utilisateurs
document.querySelectorAll('.actions-compte span').forEach(function(btnSpan) {
    btnSpan.addEventListener('click', function() {
        // Cache le formulaire courant
        this.closest('form').classList.remove('frm-affiche');
        // Affiche le formulaire ciblé par le bouton
        document.querySelector('form.' + this.dataset.formulaire).classList.add('frm-affiche');
        // Cacher tout message 'utilisateur'
        //document.querySelector('.message-util').style.display = 'none'; // Pas la meilleure façon
        document.querySelector('.message-util').classList.add('cacher'); // Mieux
    });
});