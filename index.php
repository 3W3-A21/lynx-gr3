<?php
    $page = 'accueil';
    include('inclusions/entete.php');
?>
    <section class="principale">
        <div>
            <h1><?= $amorce; ?></h1>
            <h3><?= $sousTitre; ?></h3>
            <ul class="liste-test">
                <li data-infoimportante="530.99"><?= $liste1; ?></li>
                <li data-infoimportante="120.85"><?= $liste2; ?></li>
                <li data-infoimportante="65.42"><?= $liste3; ?></li>
            </ul>
        </div>
        <div>
            <img src="images/accueil.jpg" alt="">
        </div>
    </section>
<?php
    include('inclusions/pied2page.php')
?>