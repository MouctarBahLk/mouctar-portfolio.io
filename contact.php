<?php

session_start();

if (isset($_GET['lang']) && ($_GET['lang'] == 'en' || $_GET['lang'] == 'fr')) {
  $_SESSION['lang'] = $_GET['lang'];
} elseif (!isset($_SESSION['lang'])) {
  $_SESSION['lang'] = 'fr'; // Default language
}

$en_select = ($_SESSION['lang'] == 'en') ? "selected" : "";
$fr_select = ($_SESSION['lang'] == 'fr') ? "selected" : "";

if ($_SESSION['lang'] == 'en') {
  require_once './assets/locales/en.php';
} else {
  require_once './assets/locales/fr.php';
}
// var_dump($_GET['lang']);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
 
  <link rel="stylesheet" href="assets/css/partage.css" />
  <link rel="stylesheet" href="assets/css/form-item.css" />
  <link rel="stylesheet" href="assets/css/contact.css" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <title>contact</title>
</head>


<body>
  <header>
    <!--I added this.-->
    <a href="/index.php">Mouctar</a>
    <?php
    include './assets/templates/nav.php'
    ?>
  </header>
  <main>
    <!-- <h1>Contactez-moi</h1> -->
    <div>
      <section>
        <h2><?= $trad["contact-first-section"]["h2"] ?></h2>
        <p>
          <?= $trad["contact-first-section"]["p"] ?>
        </p>
        <ul>
          <li>
            <i class="mdi mdi-email-outline"></i>
            <div>
              <h3> <?= $trad["contact-first-section"]["div1 h3"] ?> </h3>
              <p><?= $trad["contact-first-section"]["div1 p1"] ?></p>
              <p><?= $trad["contact-first-section"]["div1 p2"] ?></p>
            </div>
          </li>
          <li>
            <i class="mdi mdi-map-marker"></i>
            <div>
              <h3> <?= $trad["contact-first-section"]["div2 h3"] ?> </h3>
              <p><?= $trad["contact-first-section"]["div2 p1"] ?></p>
              <p><?= $trad["contact-first-section"]["div2 p2"] ?></p>
            </div>
          </li>
          <li>
            <i class="mdi mdi-phone"></i>
            <div>
              <h3> <?= $trad["contact-first-section"]["div3 h3"] ?> </h3>
              <p><?= $trad["contact-first-section"]["div3 p1"] ?></p>
              <p><?= $trad["contact-first-section"]["div3 p2"] ?></p>
            </div>
          </li>
        </ul>
      </section>
      <section>
        <h1>CONTACTEZ-MOI</h1>
        <!-- <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
        </p> -->
        <p>
          <?= $trad["contact-second-section"]["p"] ?>
        </p>
        <?php
        require_once './assets/templates/form.php'
        ?>
      </section>
    </div>
  </main>
  <?php
  require_once './assets/templates/footer.php'
  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./assets/js/main.js"></script>
  <script src="./assets/js/partage-js.js?parent=contact.php"></script>
  <script src="./assets/js/contact.js" type="module"></script>
</body>

</html>