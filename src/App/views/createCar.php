<?php require(basePath('src/App/templates/head.php')) ?>
<?php require(basePath('src/App/templates/navbar.php')) ?>

<?php 

    $brands = ["Alfa Romeo", "Aston Martin", "Audi", "Bentley", "BMW", "Bugatti", "Buick",
    "Cadillac", "Chevrolet", "Chrysler", "Citroën", "Dodge", "Ferrari", "Fiat",
    "Ford", "Genesis", "GMC", "Honda", "Hyundai", "Jaguar", "Jeep",
    "Kia", "Koenigsegg", "Lamborghini", "Land Rover", "Lexus", "Lincoln", "Lotus",
    "Maserati", "Mazda", "McLaren", "Mercedes-Benz", "Mini", "Mitsubishi", "Nissan",
    "Opel", "Pagani", "Peugeot", "Porsche", "Ram", "Renault", "Rolls-Royce",
    "Saab", "Seat", "Skoda", "Subaru", "Suzuki", "Tesla", "Toyota", "Volkswagen",
    "Volvo"]

?>

<section class="create-section container">
    <h1>Inserat erstellen</h1>
    <div class="create-form-wrapper">
        <form class="create-form" action="/fahrzeuge" method="POST">
            <div class="create-input-wrapper">
                <label for="brand">Automarke: </label>
                <select name="brand" id="brand">
                    <?php foreach($brands as $brand) { ?>
                        <option value="<?= $brand ?>"><?= $brand ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="create-input-wrapper">
                <label for="model">Fahrzeugmodell: </label>
                <input type="text" name="model">
            </div>
            <div class="create-input-wrapper">
                <label for="description">Beschreibung: </label>
                <textarea type="text" rows="10" name="description"></textarea>
            </div>
            <div class="create-input-wrapper">
                <label for="mileage">Kilometerstand: </label>
                <input type="text" name="mileage">
            </div>
            <div class="create-input-wrapper">
                <label for="year">Erstzulassung: </label>
                <input type="text" name="year">
            </div>
            <div class="create-input-wrapper">
                <label for="horsepower">Leistung(in PS): </label>
                <input type="text" name="horsepower">
            </div>
            <div class="create-input-wrapper">
                <label for="price">Preis (in €): </label>
                <input type="text" name="price">
            </div>
            <div class="create-input-wrapper">
                <input class="btn" type="submit" value="Absenden" name="send">
            </div>
        </form>
    </div>
</section>

<?php require(basePath('src/App/templates/footer.php')) ?>