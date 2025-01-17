<?php require(basePath('src/utils/validation.php')) ?> 
<?php require(basePath('src/templates/head.php')) ?>
<?php require(basePath('src/templates/navbar.php')) ?>
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
    <?php require(basePath('src/templates/footer.php')) ?>
