<?php require(basePath('src/App/templates/head.php')) ?>
<?php require(basePath('src/App/templates/navbar.php')) ?>
    <main>
        <section class="login-section">
            <div class="login-wrapper border">
                <h1 class="hl-mid">Anmelden</h1>
                <?php if (isset($errors)) { ?>
                    <ul>
                        <?php foreach($errors as $error) { ?>
                            <li><?= $error ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <form class="login-form" action="/auth/login" method="POST" novalidate>
                    <input type="text" name="username" placeholder="Nutzername" required>
                    <input type="password" name="password" placeholder="Passwort" required>
                    <input class="btn" type="submit" value="Anmelden">
                    <p>Noch kein Konto? <a href="/auth/register">Konto erstellen</a></p>
                </form>
            </div>
            <img class="hero-image" src="/images/jpg/hero-image.jpg" alt="">
            <div class="gradient"></div>
        </section>
    </main>
    <?php require(basePath('src/App/templates/footer.php')) ?>
