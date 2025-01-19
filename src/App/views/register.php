<?php require(basePath('src/App/templates/head.php')) ?>
<?php require(basePath('src/App/templates/navbar.php')) ?>

<?php  
$cities = [
    'Wien', 'Graz', 'Salzburg', 'Innsbruck', 'Eisenstadt', 
    'Berlin', 'Köln', 'Hamburg', 'Düsseldorf',
    'Basel', 'Zürich', 'Bern', 'Genf'
];
?>
    <main>
        <section class="login-section">
            <div class="login-wrapper border">
                <h1 class="hl-mid">Registrieren</h1>
                <ul>
                <?php if (isset($errors)) { 
                    foreach($errors as $error) { ?>
                    <li><?= $error ?></li>
                <?php }} ?>
                </ul>
                <form class="login-form" action="/auth/register" method="POST" novalidate>
                    <input type="text" name="username" value="<?= $user['username'] ?? '' ?>" placeholder="Nutzername" required>
                    <input type="email" name="email" value="<?= $user['email'] ?? '' ?>" placeholder="E-Mail-Adresse" required>
                    <input type="password" name="password" placeholder="Passwort (mind. 8 Zeichen)" required>
                    <input type="password" name="confirm" placeholder="Passwort bestätigen" required>
                    <div class="create-input-wrapper">
                        <label for="city">Stadt: </label>
                        <select name="city" id="city">
                            <?php foreach($cities as $city) { ?>
                                <option value="<?= $city ?>"><?= $city ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <label for="rights">Ich akzeptiere die <a href="/">Datenschutzbestimmungen</a></label>
                        <input type="checkbox" name="rights" id="rights" value="confirmed" required>
                    </div>
                    <input class="btn" type="submit" value="Registrieren">
                    <p>Sie sind haben bereits ein Konto? <a href="/auth/login">Anmelden</a></p>
                </form>
            </div>
            <img class="hero-image" src="/images/jpg/hero-image.jpg" alt="">
            <div class="gradient"></div>
        </section>
    </main>
    <?php require(basePath('src/App/templates/footer.php'))?>

