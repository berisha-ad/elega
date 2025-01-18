<?php require(basePath('src/App/templates/head.php')) ?>
<?php require(basePath('src/App/templates/navbar.php')) ?>



<section class="cars-section container">
    <div class="count-wrapper">
        <span class="count border">Fahrzeuge online: <?= count($cars); ?></span>
        <span class="count border">Registrierte Nutzer: <?= count($users); ?></span>
    </div>
    <h1 class="m-b-3 h2 m-t-2">Alle Fahrzeuge</h1>


<?php require(basePath('src/App/templates/carsGrid.php')) ?>

</section>



<?php require(basePath('src/App/templates/footer.php')) ?>