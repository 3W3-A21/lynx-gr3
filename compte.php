<?php
    $page = 'compte';
    include('inclusions/entete.php');
?>
    <section class="principale">
    <?php if(!isset($_SESSION['uc'])) :  ?>
        <div class="formulaires-utilisateurs">
            <!-- Connexion -->
            <form class="frm-affiche frm-connexion" action="compte.php" method="post">
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
            <form class="frm-nouveau" action="compte.php" method="post">
                <fieldset>
                    <legend>Créer un nouveau compte</legend>
                    <input type="text" name="prenom" placeholder="Prénom">
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="text" name="courriel" placeholder="<?= $frmCourrielPH; ?>">
                    <input type="password" name="mdp" placeholder="<?= $frmMdpPH; ?>">
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
            <?php if(isset($erreurConnexion)) : ?>
                <div class="erreur">Erreur de connexion : réessayez!</div>
            <?php endif; ?>
        </div>
    <?php else : ?>
        <h2>Mes investissements</h2>
    <?php endif; ?>
    </section>
<?php
    include('inclusions/pied2page.php')
?>