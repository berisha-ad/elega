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
    "Volvo"];

    $startYear = 1960;
    $currentYear = date("Y");

    $years = range($currentYear, $startYear);

?>

<section class="create-section container">
    <h1>Inserat erstellen</h1>  
    <div class="create-form-wrapper">
        <form class="create-form" action="/fahrzeuge" method="POST" enctype="multipart/form-data">
            <div class="create-input-wrapper">
                <label for="brand">Automarke: </label>
                <select name="brand" id="brand">
                    <?php foreach($brands as $brand) { ?>
                        <option value="<?= $brand ?>"><?= $brand ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="create-input-wrapper">
                <label for="image">Bilder hochladen</label>
                <input type="file" name="image">
            </div>
            <div class="create-input-wrapper">
                <label for="model">Fahrzeugmodell: </label>
                <input type="text" name="model" value="<?= $data['model'] ?? ''; ?>">
            </div>
            <div class="create-input-wrapper">
                <label for="description">Beschreibung: </label>
                <textarea type="text" rows="10" name="description"><?= $data['description'] ?? ''; ?></textarea>
            </div>
            <div class="create-input-wrapper">
                <label for="mileage">Kilometerstand: </label>
                <input type="number" value="<?= $data['mileage'] ?? ''; ?>" name="mileage">
            </div>
            <div class="create-input-wrapper">
                <label for="year">Erstzulassung: </label>
                <select name="year" id="year">
                    <?php foreach($years as $year) { ?>
                        <option value="<?= $year ?>"><?= $year ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="create-input-wrapper">
                <label for="horsepower">Leistung(in PS): </label>
                <input type="number" value="<?= $data['horsepower'] ?? ''; ?>" name="horsepower">
            </div>
            <div class="create-input-wrapper">
                <label for="price">Preis (in €): </label>
                <input type="number" value="<?= $data['price'] ?? ''; ?>" name="price">
            </div>
            <div class="create-input-wrapper">
                <input class="btn" type="submit" value="Speichern" name="send">
            </div>
        </form>
    </div>
    <?php if(isset($errors)) { ?>
    <ul class="errors">
        <?php foreach ($errors as $error) { ?>
            <li><?= $error ?></li>
        <?php } ?>
    </ul> 
    <?php }; ?>
</section>

<?php require(basePath('src/App/templates/footer.php')) ?>