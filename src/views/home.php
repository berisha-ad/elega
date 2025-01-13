<?php 

    $cars = [
        "Audi",
        "Bmw",
        "Mercedes",
        "opel"
    ]

?>

<?php require('../src/templates/head.php') ?>
<?php require('../src/templates/navbar.php') ?>
    <main>
        <section class="hero-section">
            <div class="hero-content-wrapper container">
                <h1>Luxury on tires</h1>
                <p class="p-l">Ihr Autohändler des Vertrauens in Wien</p>
            </div>
            <img class="hero-image" src="./images/jpg/hero-image.jpg" alt="">
            <div class="gradient"></div>
        </section>
        <section class="welcome-section container">
            <div class="welcome-content">
                <h2>Headline</h2>
                <p>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
                    invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et 
                    accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata 
                    sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing 
                    elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed 
                    diam voluptua. At vero eos et accusam
                </p>
            </div>
            <img class="welcome-img" src="./images/jpg/hero-image.jpg" alt="Erstes Bild">
        </section>
        <section class="new-cars-section container">
            <h2>Neue Fahrzeuge</h2>
            <div class="cars-grid">
                <?php foreach ($cars as $car) { ?>
                <a href="/">
                    <div class="car-card">
                        <img class="car-image" src="./images/jpg/hero-image.jpg" alt="Titel vom Bild">
                        <h3><?= $car ?></h3>
                        <p>Description: Allrad, Automatik, Leder... </p>
                        <div class="stats">
                            <p>50000km</p>
                            <p>2019</p>
                            <p>303ps</p>
                        </div>
                        <p class="hl-small">29990€</p>
                    </div>
                </a>
                <?php } ?>
            </div>
        </section>
    </main>
<?php require('../src/templates/footer.php') ?>