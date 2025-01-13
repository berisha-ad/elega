<?php require('../src/templates/head.php') ?>
<?php require('../src/templates/navbar.php') ?>
    <main>
        <section class="login-section">
            <div class="login-wrapper">
                <h1 class="hl-mid">Anmelden</h1>
                <form class="login-form" action="" method="post">
                    <input type="email" placeholder="E-Mail-Adresse" required>
                    <input type="password" placeholder="Passwort" required>
                    <input class="login-btn" type="submit" value="Anmelden">
                    <p>Noch kein Konto? <a href="./registrieren">Konto erstellen</a></p>
                </form>
            </div>
            <img class="hero-image" src="./images/jpg/hero-image.jpg" alt="">
            <div class="gradient"></div>
        </section>
    </main>
    <?php require('../src/templates/footer.php') ?>
