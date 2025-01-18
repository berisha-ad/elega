<?php require(basePath('src/App/templates/head.php')) ?>
<?php require(basePath('src/App/templates/navbar.php')) ?>

    <main>
        <section class="hero-section">
            <div class="hero-content-wrapper container">
                <h1>Luxury on tires</h1>
                <p class="p-l">Finde dein neues Auto jetzt!</p>
                <div class="btn-wrapper">
                    <a class="btn" href="/registrieren">Jetzt registrieren</a>
                    <a class="btn" href="/neues-inserat">Inserat erstellen</a>
                </div>
            </div>
            <img class="hero-image" src="./images/jpg/hero-image.jpg" alt="">
            <div class="gradient"></div>
        </section>

        <section class="cars-section container">
            <h2 class="f-w-500 m-b-3">Zuletzt hinzugefügte Fahrzeuge</h2>
            <?php require(basePath('src/App/templates/carsGrid.php')) ?>
        </section>
    </main>
    <?php require(basePath('src/App/templates/footer.php')) ?>