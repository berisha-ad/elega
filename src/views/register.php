<?php require('../src/utils/validation.php') ?> 
<?php require('../src/templates/head.php') ?>
<?php require('../src/templates/navbar.php') ?>
    <main>
        <section class="login-section">
            <div class="login-wrapper">
                <h1 class="hl-mid">Registrieren</h1>
                <?php if ($success) { ?>
                    <p class="success"><?= $success ?></p>
                <?php } ?>
                <form class="login-form" action="" method="post">
                    <input type="text" name="username" placeholder="Nutzername" required>
                        <?php if (!empty($errors['username'])) { ?>
                        <p class="error"><?= $errors['username'] ?></p>
                        <?php } ?>
                    <input type="email" name="email" placeholder="E-Mail-Adresse" required>
                        <?php if (!empty($errors['email'])) { ?>
                        <p class="error"><?= $errors['email'] ?></p>
                        <?php } ?>
                    <input type="password" name="password" placeholder="Passwort (mind. 8 Zeichen)" required>
                        <?php if (!empty($passerrors)) { ?>
                            <?php foreach ($passerrors as $field => $error): ?>
                            <p class="error"><?= $error ?></p>
                            <?php endforeach; ?>
                        <?php } elseif (!empty($errors['confirm'])) { ?>
                        <p class="error"><?= $errors['confirm'] ?></p>
                        <?php } ?>
                    <input type="password" name="confirm" placeholder="Passwort bestätigen" required>
                    <div class="gender-selection">
                        <p>Wähle dein Geschlecht:</p>
                        <input type="radio" name="gender" id="male" value="male">
                        <label for="male">Männlich</label>
                        <input type="radio" name="gender" id="female" value="female">
                        <label for="female">Weiblich</label>
                        <input type="radio" name="gender" id="nogender" value="nogender">
                        <label for="nogender">Keine Angabe</label>
                        <?php if(!empty($errors['gender'])) { ?>
                            <p class="error"><?= $errors['gender']?></p>
                        <?php } ?>
                    </div>
                    <div>
                        <label for="country">Wähle dein Land:</label>
                        <select name="country" id="country" required>
                            <option value="austria">Österreich</option>
                            <option value="germany">Deutschland</option>
                            <option value="switzerland">Schweiz</option>
                            <option value="france">Frankreich</option>
                        </select>
                    </div>
                    <div>
                        <label for="rights">Ich akzeptiere die <a href="/">Datenschutzbestimmungen</a></label>
                        <input type="checkbox" name="rights" id="rights" value="confirmed" required>
                        <?php if(!empty($errors['rights'])) { ?>
                            <p class="error"><?= $errors['rights']?></p>
                        <?php } ?>
                    </div>
                    <input class="login-btn" type="submit" value="Registrieren">
                    <p>Sie sind haben bereits ein Konto? <a href="./login">Anmelden</a></p>
                </form>
            </div>
            <img class="hero-image" src="./images/jpg/hero-image.jpg" alt="">
            <div class="gradient"></div>
        </section>
    </main>
    <?php require('../src/templates/footer.php') ?>
