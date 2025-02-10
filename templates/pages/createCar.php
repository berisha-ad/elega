<?php 
    $this->includePartial('head');
    $this->includePartial('navbar') 
?>

<?php 

    $brands = ["Alfa Romeo", "Aston Martin", "Audi", "Bentley", "BMW", "Bugatti", "Buick",
    "Cadillac", "Chevrolet", "Chrysler", "Citroën", "Dodge", "Ferrari", "Fiat",
    "Ford", "Genesis", "GMC", "Honda", "Hyundai", "Jaguar", "Jeep",
    "Kia", "Koenigsegg", "Lamborghini", "Land Rover", "Lexus", "Lincoln", "Lotus",
    "Maserati", "Mazda", "McLaren", "Mercedes-Benz", "Mini", "Mitsubishi", "Nissan",
    "Opel", "Pagani", "Peugeot", "Porsche", "Ram", "Renault", "Rolls-Royce",
    "Saab", "Seat", "Skoda", "Subaru", "Suzuki", "Tesla", "Toyota", "Volkswagen(VW)",
    "Volvo"];

    $startYear = 1960;
    $currentYear = date("Y");

    $years = range($currentYear, $startYear);

?>

<section class="create-section container">
    <h1>Inserat erstellen</h1>  
    <div class="create-form-wrapper">
        <form class="create-form" action="/fahrzeug/erstellen" method="POST" enctype="multipart/form-data">
            <div class="create-input-wrapper">
                <label for="brand">Automarke: </label>
                <select name="brand" id="brand">
                    <?php foreach($brands as $brand) { ?>
                        <option value="<?= $brand ?>"><?= $brand ?></option>
                    <?php } ?>
                    <option value="<?= $data['brand'] ?? ''; ?>" selected><?= $data['brand'] ?? ''; ?></option>
                </select>
            </div>
            <div class="create-input-wrapper">
                <label for="image">Bilder hochladen</label>
                <input type="file" name="image" id="image">
                <?php if(isset($data['medialink'])) { ?>
                <img src="../<?= htmlspecialchars($data['medialink']) ?>" alt="Vorschau" style="max-width: 200px;">
                <input type="hidden" name="existing_file" value="<?= htmlspecialchars($data['medialink']) ?>">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                <input type="hidden" name="_method" value="<?= htmlspecialchars($method) ?>">
                <?php } ?>
            </div>
            <div class="create-input-wrapper">
                <label for="model">Fahrzeugmodell: </label>
                <input type="text" id="model" name="model" value="<?= $data['model'] ?? ''; ?>">
            </div>
            <div class="create-input-wrapper">
                <label for="description">Beschreibung: </label>
                <textarea type="text" rows="10" id="description" name="description"><?= $data['description'] ?? ''; ?></textarea>
            </div>
            <div class="create-input-wrapper">
                <label for="mileage">Kilometerstand: </label>
                <input type="number" value="<?= $data['mileage'] ?? ''; ?>" name="mileage" id="mileage">
            </div>
            <div class="create-input-wrapper">
                <label for="year">Erstzulassung: </label>
                <select name="year" id="year">
                    <?php foreach($years as $year) { ?>
                        <option value="<?= $year ?>"><?= $year ?></option>
                    <?php } ?>
                    <option value="<?= $data['year'] ?? ''; ?>" selected><?= $data['year'] ?? ''; ?></option>
                </select>
            </div>
            <div class="create-input-wrapper">
                <label for="horsepower">Leistung(in PS): </label>
                <input type="number" value="<?= $data['horsepower'] ?? ''; ?>" name="horsepower" id="horsepower">
            </div>
            <div class="create-input-wrapper">
                <label for="price">Preis (in €): </label>
                <input type="number" value="<?= $data['price'] ?? ''; ?>" name="price" id="price">
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

<?php $this->includePartial('footer'); ?>