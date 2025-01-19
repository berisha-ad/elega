<?php use Framework\Session; ?>

<?php require(basePath('src/App/templates/head.php')) ?>
<?php require(basePath('src/App/templates/navbar.php')) ?>

<section class="profile-section container">
    <div class="profile-content">
        <h1>Willkommen, <?= Session::get('user')['username'] ?>!</h1>
        <form action="/auth/logout" method="POST">
            <input class="btn" type="submit" value="Abmelden">
        </form>
    </div>
</section>


<?php require(basePath('src/App/templates/footer.php')) ?>