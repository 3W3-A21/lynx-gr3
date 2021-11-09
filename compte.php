<?php
    $page = 'compte';
    include('inclusions/entete.php');
?>
    <section class="principale">
    <?php if(!isset($_SESSION['uc'])) :  ?>
        <div class="formulaires-utilisateurs">
            <!-- Connexion -->
            <form class="<?php if(!isset($frmActif)) { echo 'frm-affiche '; } ?>frm-connexion" action="compte.php" method="post">
                <fieldset>
                    <legend><?= $frmLegende; ?></legend>
                    <input type="text" name="courriel" placeholder="<?= $frmCourrielPH; ?>">
                    <input type="password" name="mdp" placeholder="<?= $frmMdpPH; ?>">
                    <input type="submit" name="btnSubmitConnexion" value="<?= $frmBoutonConnecter; ?>">
                </fieldset>
                <div class="actions-compte">
                    <span data-formulaire='frm-mdp' class="btn-mdp"><?= $lienMdpOublie; ?></span>
                    <span data-formulaire='frm-nouveau' class="btn-nouveau"><?= $lienNouveauCompte; ?></span>
                </div>
            </form>
            <!-- Nouveau compte -->
            <form class="<?php if(isset($frmActif) && $frmActif=='frm-nouveau') { echo 'frm-affiche '; }  ?>frm-nouveau" action="compte.php" method="post">
                <fieldset>
                    <legend>Créer un nouveau compte</legend>
                    <input required minlength="2" type="text" name="prenom" placeholder="Prénom" value="<?php if(isset($_POST['btnSubmitNouveau']) && isset($_POST['prenom'])) { echo $_POST['prenom']; } ?>">
                    <input type="text" name="nom" placeholder="Nom">
                    <input required type="email" name="courriel" placeholder="<?= $frmCourrielPH; ?>" value="<?php if(isset($_POST['btnSubmitNouveau']) && isset($_POST['courriel'])) { echo $_POST['courriel']; } ?>">
                    <!-- 
                        Attention l'attribut pattern dans le champ de formulaire
                        suivant oblige les conditions suivantes sur un mot de passe :
                        a) Au moins une lettre minuscule
                        b) Au moins une lettre majuscule
                        c) Au moins un chiffre
                        d) Au moins un caractère spécial parmi ceux-ci : !@#$%^&*_=+-
                        e) Longueur totale entre 10 et 30 caractères
                    -->
                    <input required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{10,30}$" type="password" name="mdp" placeholder="<?= $frmMdpPH; ?>">
                    <input type="submit" name="btnSubmitNouveau" value="Soumettre">
                </fieldset>
                <div class="actions-compte">
                    <span data-formulaire='frm-connexion' class="btn-connexion">Connexion</span>
                </div>
            </form>
            <!-- Mot de passe oublié -->
            <form class="frm-mdp" action="compte.php" method="post">
                <fieldset>
                    <legend>Réinitialiser votre mot de passe</legend>
                    <input type="text" name="courriel" placeholder="<?= $frmCourrielPH; ?>">
                    <input type="submit" name="btnSubmitMdp" value="Soumettre">
                </fieldset>
                <div class="actions-compte">
                    <span data-formulaire='frm-connexion' class="btn-connexion">Connexion</span>
                    <span data-formulaire='frm-nouveau' class="btn-nouveau"><?= $lienNouveauCompte; ?></span>
                </div>
            </form>
            <?php if(isset($messageUtilisateur)) : ?>
                <div class="message-util <?= $messageUtilisateur[1]; ?>"><?= $messageUtilisateur[0]; ?></div>
            <?php endif; ?>
        </div>
    <?php else : ?>
        <h2>Mes investissements</h2>
    <?php endif; ?>
    </section>
<?php
    include('inclusions/pied2page.php')
?>