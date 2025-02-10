


    <div class="cars-grid">
        <?php foreach ($cars as $car) { ?>
            <a href="/fahrzeug?id=<?= $car['id'] ?>">
                <div class="car-card border">
                    <div class="car-card-left">
                        <img class="car-image border-dark" src="<?= $car['medialink'] ?>" alt="<?= $car['brand'] ?> <?= $car['model'] ?>">
                        <div class="gradient-card"></div>
                    </div>
                    <div class="car-card-right">
                        <div class="upper-line">
                            <span class="date color-grey"> <?= formatDate($car['created_at']); ?></span>
                            <?php $id = $car['user_id'];
                            foreach ($users as $user) {
                                if ($user['id'] === $id) { ?>
                            <span class="color-grey user">hochgeladen von <?= $user['username'] ?></span>
                                <?php }
                                }
                            ?>
                        </div>
                        <h3 class="h3"><?= $car['brand'] ?> <?= $car['model'] ?></h3>
                        <p><?= shortenText($car['description'], 10) ?></p>
                        <?php $id = $car['user_id'];
                            foreach ($users as $user) {
                                if ($user['id'] === $id) { ?>
                                    <ul class="stats">
                                        <li class="stat"><?= $car['mileage'] ?> km</li>
                                        <li class="stat"><?= $car['year'] ?></li>
                                        <li class="stat"><?= $car['horsepower'] ?> PS</li>
                                        <li class="stat city"><?= $user['city'] ?></li>
                                    </ul>
                                    <span class="price">€<?= $car['price'] ?></span>
                                <?php }
                            }
                        ?>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
