<?php require(basePath('src/App/templates/head.php')) ?>
<?php require(basePath('src/App/templates/navbar.php')) ?>

<section class="cars-section container">
    <span class="count border">Fahrzeuge online: <?= count($cars); ?></span>
    <h1 class="m-b-3 h2 m-t-2">Alle Fahrzeuge</h1>
    <div class="cars-grid">
        <?php foreach ($cars as $car) { ?>
        <a href="/fahrzeuge/<?= $car['id'] ?>">
            <div class="car-card border">
                <img class="car-image border-dark" src="./images/jpg/hero-image.jpg" alt="Titel vom Bild">
                <h2 class="h3"><?= $car['brand'] ?> <?= $car['model'] ?></h2>
                <p><?= shortenText($car['description'], 10) ?></p>
                <div class="stats">
                    <p><?= $car['mileage'] ?> km</p>
                    <p><?= $car['year'] ?></p>
                    <p><?= $car['horsepower'] ?> PS</p>
                </div>
                <p class="hl-small">€<?= $car['price'] ?></p>
                <p>Fahrzeugdetails --></p>
            </div>
        </a>
        <?php } ?>
    </div>
</section>



<?php require(basePath('src/App/templates/footer.php')) ?>