<section id="Accueil">
    <div class="slideshow-container">
        <div class="slide-background"></div>
        <div class="slide-background"></div>
        <div class="slide-background"></div>
    </div>
    <div class="text-container">
        <h1 class="bienvenue"><?php echo $trad['accueil']['titre']; ?></h1>
        <h2 class="text"><?php echo $trad['accueil']['description']; ?></h2>
        <div class="button-container">
            <button onclick="window.location.href='<?php echo $trad['accueil']['lien_projets']; ?>'"><?php echo $trad['accueil']['bouton_projets']; ?></button>
            <button onclick="window.location.href='<?php echo $trad['accueil']['lien_cv']; ?>'" download><?php echo $trad['accueil']['bouton_cv']; ?></button>
        </div>
    </div>
</section>