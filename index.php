
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

include __DIR__ . '/assets/models/Projects.php';

$projects = new Projects();

// Get parameters
$start = 0;
$count = 3;

// Check if the user is on a mobile device or tablet
if (isset($_SERVER['HTTP_USER_AGENT'])) {
  if (preg_match('/(tablet|ipad|android(?!.*mobile))/i', $_SERVER['HTTP_USER_AGENT'])) {
    $count = 2; // Load 2 projects initially on tablet devices
  } elseif (preg_match('/mobile/i', $_SERVER['HTTP_USER_AGENT'])) {
    $count = 1; // Load 1 project initially on mobile devices
  }
}

$allProject = $projects->getProjectBetween($start, $count);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  
  <link rel="stylesheet" href="assets/css/partage.css" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <title>Mouctar Bah portfolio</title>
</head>

<body>

  <header>
    <!--I added this.-->
    <a href="/index.php">Mouctar</a>
    <?php
    require_once './assets/templates/nav.php'
    ?>
  </header>
  <main>
    
        <?php
        require_once './assets/templates/accueil.php'
        ?>
     
    <?php
        require_once './assets/templates/competence.php'
        ?>
         <?php
        require_once './assets/templates/formation.php'
        ?>
        
       
        <section  id="projects">
        <h2 class="pro"><?= $trad["projectSection"]["titre"] ?></h2>

      <ul id="ul">
        <?php foreach ($allProject as $project) : ?>
          <?php include __DIR__ . '/assets/templates/article.php' ?>
        <?php endforeach; ?>
      </ul>
      <button><?= $trad["index"]["load"] ?></button>
   
</section>
    <?php
        require_once './assets/templates/experience_pro.php'
        ?>
  </main>
  <?php
  require_once './assets/templates/footer.php'
  ?>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./assets/js/partage-js.js?parent=index.php"></script>
  <script src="./assets/js/ajax.js"></script>
  <script src="./assets/js/main.js"></script>
  
</body>

</html>