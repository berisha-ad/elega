<?php require(basePath('src/App/templates/head.php')) ?>
<?php require(basePath('src/App/templates/navbar.php')) ?>
<?php use Framework\Session; ?>


<section class="show-section container">
    <div class="show-wrapper">
        <h1><?= $car['brand'] . ' ' . $car['model'] ?></h1>
        <img class="border car-image-big" src="<?= $car['medialink'] ?>" alt="<?= $car['brand'] ?> <?= $car['model'] ?>">
        <p class="max-w-500"><?= $car['description'] ?></p>
        <?php $id = $car['user_id'];
            foreach ($users as $user) {
                if ($user['id'] === $id) { ?>
                <p class="color-grey">hochgeladen von <?= $user['username'] ?></p>
                <div class="stats">
                    <p><?= $car['mileage'] ?> km</p>
                    <p><?= $car['year'] ?></p>
                    <p><?= $car['horsepower'] ?> PS</p>
                </div>
                <p>Standort: <?= $user['city'] ?></p>
        <p class="hl-mid m-t-auto f-w-500">€<?= $car['price'] ?></p>
        <div>
            <a class="btn" href="mailto:<?= $user['email'] ?>">Verkäufer kontaktieren</a>
        </div>
        <?php }
            }
        ?>
    </div>
    <?php if(Session::has('user') && Session::get('user')['id'] === $id) { ?>
    <div class="btn-wrapper">
        <form class="m-t-2" action="/fahrzeug/entfernen" method="POST" >
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $car['id'] ?>">
            <input class="btn delete" type="submit" value="Inserat löschen">
        </form>
        <form class="m-t-2" action="/fahrzeug/bearbeiten" method="POST" >
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?= $car['id'] ?>">
            <input class="btn" type="submit" value="Bearbeiten">
        </form>
    </div>
    <?php } ?>
</section>



<?php require(basePath('src/App/templates/footer.php')) ?>