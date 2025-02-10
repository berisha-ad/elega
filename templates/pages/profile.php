<?php use Framework\Session; ?>

<?php 
    $this->includePartial('head');
    $this->includePartial('navbar') 
?>

<section class="profile-section container">
    <div class="profile-content">
        <h1 class="color-grey h2">Willkommen, <?= Session::get('user')['username'] ?>!</h1>
        <div class="profile-header"><h2 class="h1">Deine Inserate</h2><a href="/neues-inserat" class="btn add-car">&#9547;</a></div>
        <?php $this->includePartial('carsGrid'); ?>
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


<?php $this->includePartial('footer'); ?>