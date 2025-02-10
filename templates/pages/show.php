<?php 
    $this->includePartial('head');
    $this->includePartial('navbar') 
?>
<?php use Framework\Session; ?>


<section class="show-section container">
    <div class="show-wrapper">
        <a href="/fahrzeuge" class="btn">Zurück</a>
        <h1><?= $car['brand'] . ' ' . $car['model'] ?></h1>
        <img class="border car-image-big" src="<?= $car['medialink'] ?>" alt="<?= $car['brand'] ?> <?= $car['model'] ?>">
        <p class="max-w-50"><?= $car['description'] ?></p>
        <?php $id = $car['user_id'];
            foreach ($users as $user) {
                if ($user['id'] === $id) { ?>
                <p class="color-grey">hochgeladen von <?= $user['username'] ?></p>
                <ul class="stats">
                    <li class="stat"><?= $car['mileage'] ?> km</li>
                    <li class="stat"><?= $car['year'] ?></li>
                    <li class="stat"><?= $car['horsepower'] ?> PS</li>
                    <li class="stat city">Standort: <?= $user['city'] ?></li>
                </ul>
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



<?php $this->includePartial('footer'); ?>