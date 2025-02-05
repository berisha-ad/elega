<?php require(basePath('src/App/templates/head.php')) ?>
<?php require(basePath('src/App/templates/navbar.php')) ?>

<?php  
$cities = [
    // Alle großen Städte in Österreich
    "Wien", "Graz", "Linz", "Salzburg", "Innsbruck", "Klagenfurt", "Villach", "Wels",
    "Sankt Pölten", "Dornbirn", "Steyr",

    // Alle großen Städte in Deutschland
    "Berlin", "Hamburg", "München", "Köln", "Frankfurt am Main", "Stuttgart", "Düsseldorf",
    "Leipzig", "Dortmund", "Essen", "Bremen", "Dresden", "Hannover", "Nürnberg",
    "Duisburg", "Bochum", "Wuppertal", "Bielefeld", "Bonn", "Münster", "Karlsruhe",
    "Mannheim", "Augsburg", "Wiesbaden", "Gelsenkirchen", "Mönchengladbach", "Braunschweig", "Chemnitz",
    "Kiel", "Aachen", "Halle (Saale)", "Magdeburg", "Freiburg im Breisgau", "Krefeld", "Lübeck",
    "Oberhausen", "Erfurt", "Mainz", "Rostock", "Kassel", "Hagen", "Saarbrücken",

    // Alle großen Städte in der Schweiz
    "Zürich", "Genf", "Basel", "Lausanne", "Bern", "Winterthur", "Luzern",
    "St. Gallen", "Lugano", "Biel/Bienne", "Thun", "Köniz", "La Chaux-de-Fonds", "Schaffhausen"
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
                    <div class="input-block">
                        <input type="text" id="username" name="username" value="<?= $user['username'] ?? '' ?>" placeholder="Nutzername" required>
                        <span id="messageUsername"></span>
                    </div>
                    <div class="input-block">
                        <input type="email" id="email" name="email" value="<?= $user['email'] ?? '' ?>" placeholder="E-Mail-Adresse" required>
                        <span id="messageEmail"></span>
                    </div>
                    <div class="input-block">
                        <input type="password" id="password" name="password" placeholder="Passwort (mind. 8 Zeichen)" required>
                        <span id="messagePassword"></span>
                    </div>
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
                    <input class="btn" id="registerBtn" type="submit" value="Registrieren">
                    <p>Sie sind haben bereits ein Konto? <a href="/auth/login">Anmelden</a></p>
                </form>
            </div>
            <img class="hero-image" src="/images/jpg/hero-image.jpg" alt="">
            <div class="gradient"></div>
        </section>
    </main>
    </body>
    </html>

