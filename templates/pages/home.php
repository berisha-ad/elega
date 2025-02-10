<?php 
    use Framework\Session;
?>

<?php 
    $this->includePartial('head');
    $this->includePartial('navbar') 
?>

    <main>
        <section class="hero-section">
            <div class="hero-content-wrapper container">
                <h1>Luxury on tires</h1>
                <?php if(Session::has('user')) { ?>
                    <p class="p-l">Angemeldet als <?= Session::get('user')['username']; ?></p>
                    <a class="btn" href="/neues-inserat">Inserat erstellen</a>
                <?php } else { ?>
                    <p class="p-l">Finde dein neues Auto jetzt!</p>
                    <a class="btn" href="/auth/register">Jetzt registrieren</a>
                <?php } ?>
            </div>
            <img class="hero-image" src="./images/jpg/hero-image.jpg" alt="">
            <div class="gradient"></div>
        </section>

        <section class="cars-section container">
            <h2 class="m-b-3">Kürzlich hochgeladen</h2>
            <?php $this->includePartial('carsGrid'); ?>
            <a class="btn m-t-2" href="/fahrzeuge">Alle Fahrzeuge</a>
        </section>
    </main>
    <?php $this->includePartial('footer'); ?>