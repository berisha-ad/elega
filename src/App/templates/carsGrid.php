
    <div class="cars-grid">
        <?php foreach ($cars as $car) { ?>
            <a href="/fahrzeuge/<?= $car['id'] ?>">
                <div class="car-card border">
                    <img class="car-image border-dark" src="./images/jpg/hero-image.jpg" alt="Titel vom Bild">
                    <h2 class="h3"><?= $car['brand'] ?> <?= $car['model'] ?></h2>
                    <p><?= shortenText($car['description'], 10) ?></p>
                    <?php $id = $car['user_id'];
                        foreach ($users as $user) {
                            if ($user['id'] === $id) { ?>
                                <p class="color-grey">hochgeladen von <?= $user['username'] ?></p>
                                <div class="stats">
                                    <p><?= $car['mileage'] ?> km</p>
                                    <p><?= $car['year'] ?></p>
                                    <p><?= $car['horsepower'] ?> PS</p>
                                </div>
                                <p>Standort: <?= $user['country'] . ", " . $user['city'] ?></p>
                            <?php }
                        }
                    ?>
                    <p class="hl-mid m-t-auto f-w-500">€<?= $car['price'] ?></p>
                    <p>Fahrzeugdetails --></p>
                </div>
            </a>
        <?php } ?>
    </div>
