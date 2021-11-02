<?php
    $page = 'compte';
    include('inclusions/entete.php');
?>
    <section class="principale">
    <?php if(!isset($_SESSION['uc'])) :  ?>
        <div class="formulaires-utilisateurs">
            <!-- Connexion -->
            <form action="compte.php" method="post">
                <fieldset>
                    <legend><?= $frmLegende; ?></legend>
                    <input type="text" name="courriel" placeholder="<?= $frmCourrielPH; ?>">
                    <input type="password" name="mdp" placeholder="<?= $frmMdpPH; ?>">
                    <input type="submit" value="<?= $frmBoutonConnecter; ?>">
                </fieldset>
                <div class="actions-compte">
                    <a href="#"><?= $lienMdpOublie; ?></a>
                    <a href="#"><?= $lienNouveauCompte; ?></a>
                </div>
            </form>
            <!-- Nouveau compte -->
            <form action="compte.php" method="post">
                <fieldset>
                    <legend>Créer un nouveau compte</legend>
                    <input type="text" name="prenom" placeholder="Prénom">
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="text" name="courriel" placeholder="<?= $frmCourrielPH; ?>">
                    <input type="password" name="mdp" placeholder="<?= $frmMdpPH; ?>">
                    <input type="submit" value="Soumettre">
                </fieldset>
                <div class="actions-compte">
                    <a href="#">Connexion</a>
                </div>
            </form>
            <!-- Mot de passe oublié -->
            <form action="compte.php" method="post">
                <fieldset>
                    <legend>Réinitialiser votre mot de passe</legend>
                    <input type="text" name="courriel" placeholder="<?= $frmCourrielPH; ?>">
                    <input type="submit" value="Soumettre">
                </fieldset>
                <div class="actions-compte">
                    <a href="#">Connexion</a>
                    <a href="#"><?= $lienNouveauCompte; ?></a>
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