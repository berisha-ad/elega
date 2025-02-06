<?php require(basePath('src/App/templates/head.php')) ?>
<?php require(basePath('src/App/templates/navbar.php')) ?>



<section class="cars-section container">
    <div class="count-wrapper">
        <?php if (!isset($search_term)) { ?>
        <span class="count border">Fahrzeuge online: <?= count($cars); ?></span>
        <span class="count border">Registrierte Nutzer: <?= count($users); ?></span>
        <?php } ?>
        <div class="search-wrapper">
            <form class="search-form" action="/search" method="GET">
                <input class="search-input" type="text" name="search" placeholder="Suche...">
                <input class="search-btn" type="submit" value="&#128269 Suche">
            </form>
        </div>
    </div>
    <h1 class="m-b-3 h2 m-t-2"><?= isset($search_term) ? 'Suchergebnisse für "' . $search_term . '"' : 'Alle Fahrzeuge' ?></h1>


<?php require(basePath('src/App/templates/carsGrid.php')) ?>
    <?php if (isset($search_term)) { ?>
        <a href="/fahrzeuge" class="btn m-t-2">Alle Fahrzeuge</a>
    <?php } ?>

</section>



<?php require(basePath('src/App/templates/footer.php')) ?>