<?php use Framework\Session; ?>

<?php require(basePath('src/App/templates/head.php')) ?>
<?php require(basePath('src/App/templates/navbar.php')) ?>

<section class="profile-section container">
    <div class="profile-content">
        <h1 class="color-grey h2">Willkommen, <?= Session::get('user')['username'] ?>!</h1>
        <h2 class="h1">Deine Inserate</h2>
        <?php require(basePath('src/App/templates/carsGrid.php')) ?>
        <div class="btn-wrapper">
            <form action="/auth/logout" method="POST">
                <input class="btn delete" type="submit" value="Abmelden">
            </form>
            <form action="/auth/delete" id="accountDeleteForm" method="POST">
                <input id="deleteAccountBtn" class="btn delete" type="submit" value="Konto löschen">
            </form>
        </div>
    </div>
</section>


<?php require(basePath('src/App/templates/footer.php')) ?>