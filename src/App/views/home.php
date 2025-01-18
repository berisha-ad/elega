<?php require(basePath('src/App/templates/head.php')) ?>
<?php require(basePath('src/App/templates/navbar.php')) ?>
    <main>
        <section class="hero-section">
            <div class="hero-content-wrapper container">
                <h1>Luxury on tires</h1>
                <p class="p-l">Finde dein neues Auto jetzt!</p>
                <div class="btn-wrapper">
                    <a class="btn" href="/register">Jetzt registrieren</a>
                    <a class="btn" href="/inserieren">Inserat erstellen</a>
                </div>
            </div>
            <img class="hero-image" src="./images/jpg/hero-image.jpg" alt="">
            <div class="gradient"></div>
        </section>
        <section class="new-cars-section container">
            <h2>Zuletzt hinzugefügt</h2>
            <div class="cars-grid">
                <?php foreach ($cars as $car) { ?>
                <a href="/fahrzeuge/<?= $car['id'] ?>">
                    <div class="car-card border">
                        <img class="car-image border-dark" src="./images/jpg/hero-image.jpg" alt="Titel vom Bild">
                        <h3><?= $car['brand'] ?> <?= $car['model'] ?></h3>
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
    </main>
    <?php require(basePath('src/App/templates/footer.php')) ?>