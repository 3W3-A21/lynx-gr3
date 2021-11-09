<?php
// Demander à PHP de gérer la session d'utilisation
session_start();

// echo '<hr>';
// print_r($_POST);
// echo '<hr>';

// Vérifier s'il y a un paramètre d'URL dans la requête
if(isset($_GET['action']) && $_GET['action'] == 'lo') {
    // Détruire la variable de session 'util'
    unset($_SESSION['uc']);
}

// Si le formulaire de ****connexion**** est soumit
if(isset($_POST['btnSubmitConnexion'])) {
    // Récupérer la saisie de l'utilisateur
    $courriel = $_POST['courriel'];
    $mdp = $_POST['mdp'];

    // Lire l'info sur TOUS les utilisateurs dans le fichier JSON
    $utilsTexte = file_get_contents('data/utilisateurs.json');
    $utilsTab = json_decode($utilsTexte, true);
    //print_r($utilsTab);

    // Tester s'il y a un utilisateur ayant l'adresse de courriel donnée 
    // et si les mots de passe coincident
    if(isset($utilsTab[$courriel]) 
            && $utilsTab[$courriel]['mdp'] == hash('sha512', $mdp)) {
        // Tester si cet utilisateur a donné le bon mot de passe
        // Conserver cette information dans la session d'utilisateur
        $_SESSION['uc'] = $courriel;
    }
    else {
        $messageUtilisateur = ["Erreur de connexion : réessayez !", "erreur"];
    }
}

// Si le formulaire de création de nouveau compte est soumit
if(isset($_POST['btnSubmitNouveau'])) {
  // Étape 1 : récupérer la saisie de l'utilisateur
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $courriel = $_POST['courriel'];
  $mdpEncrypte = hash('sha512', $_POST['mdp']);
  
  // Étape 2 : Lire et décoder le fichier JSON 'utilisateurs.json'
  $utilisateurs = json_decode(file_get_contents('data/utilisateurs.json'), true);
  // print_r($utilisateurs);

  // Vérifier si le courriel donné dans le formulaire n'est pas déjà associé
  // à un compte utilisateur existant
  if(isset($utilisateurs[$courriel])) {
    // Courriel déjà utilisé
    // Afficher un message d'erreur à l'endroit approprié dans la page Web
    $messageUtilisateur = ["Ce courriel est déjà utilisé : le compte n'a pas été créé.", "erreur"];
    $frmActif = 'frm-nouveau';
  }
  else {
    // On peut créer le nouveau compte
    // 2.a) Créer un tableau PHP représentant le nouveau compte
    $nouvelUtil = [
      'nom'     => $nom,
      'prenom'  => $prenom,
      'mdp'     => $mdpEncrypte,
      'doc'     => date('Y-m-d')
    ];

    // 2.b) Ajouter ce tableau dans le grand tableau des utilisateurs à 
    // l'étiquette correspondant à l'adresse de courriel saisie
    $utilisateurs[$courriel] = $nouvelUtil;
    // echo '<hr>';
    // print_r($utilisateurs);

    // 2.c) Convertir le tableau $utilisateurs en format JSON et écrire la chaîne
    // de caractères ainsi obtenue dans le fichier "utilisateurs.json"
    file_put_contents('data/utilisateurs.json', json_encode($utilisateurs));

    // 2.d) Afficher un message confirmant la création du compte à l'endroit 
    // approprié de la page Web
    $messageUtilisateur = ["Votre compte a été créé avec succès.", "info"];
  }

}

if(isset($_POST['btnSubmitMdp'])) {
  echo 'Formulaire mot de passe oublié soumit ...';
  // Faire le nécéssaire (bla bla bla)

}



// Langues disponibles
$languesDisponibles = [];
$nomsDesLangues = [];
$contenuDossierTextes = scandir('textes');
foreach($contenuDossierTextes as $nomDossier) {
  if($nomDossier != '.' && $nomDossier != '..') {
    $codeEtNomLangue = explode('-', $nomDossier);
    $languesDisponibles[] = $codeEtNomLangue[0];
    $nomsDesLangues[$codeEtNomLangue[0]] = $codeEtNomLangue[1];
  }
}

// i18n
// A - Déterminer la langue par défaut
$langueChoisie = 'fr';

// B - Vérifier si l'utilisateur a déjà fait un choix de langue auparavant.
// Si tel est le cas, le tableau $_CCOKIE contiendra un témoin HTTP nommé 
// 'simfolio_langue' (voir le code de l'étape C plus loin)
if(isset($_COOKIE['simfolio_langue']) && in_array($_COOKIE['simfolio_langue'], $languesDisponibles)) {
  $langueChoisie = $_COOKIE['simfolio_langue'];
}

// C - Si l'utilisateur choisi une langue en cliquant un lien dans la navigation en haut de la page
if(isset($_GET['langue']) && in_array($_GET['langue'], $languesDisponibles)) {
  $langueChoisie = $_GET['langue'];
  
  // C2 - Retenir le choix de langue de l'utilisateur dans un témoin HTTP (cookie)
  setcookie('simfolio_langue', $langueChoisie, time() + 365*24*60*60*2); // expire dans 2 ans
}

// D - On est enfin prêt à charger le fichier contenant les textes dans langue choisie
include('textes/' . $langueChoisie . '-' . $nomsDesLangues[$langueChoisie] . '/i18n.txt.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/lynx-64.png">
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,700|Roboto:700,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/styles.css">
    <title><?= $meta[$page]['titre']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $meta[$page]['desc']; ?>">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php" title="<?= $titreLienAccueil; ?>"><img src="images/lynx-64.png" alt="Lynx" class="logo"></a>
            <h1 class="logo">Lynx</h1>
        </div>
        <nav>
          <a href="compte.php" class="<?php if($page=='compte') { echo 'actif'; } ?>"><?= $lienMonCompte; ?></a>
          <?php if(isset($_SESSION['uc'])): ?>
            <span>
                (<i><?= $_SESSION['uc']; ?></i>
                <a href="compte.php?action=lo">Déconnexion</a>)
            </span>
          <?php endif; ?>            
        </nav>
    </header>