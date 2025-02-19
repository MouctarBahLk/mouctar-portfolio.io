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

include __DIR__ . '/./assets/models/Projects.php';

if (!empty($_GET["id"])) {
  $projectId = checkInput($_GET["id"]);
  $projects = new Projects();
  $project = $projects->getProject(intval($projectId));
}

function checkInput($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<!DOCTYPE html>
<html lang="fr">


<head>
  <link rel="stylesheet" href="assets/css/partage.css" />
  <link rel="stylesheet" href="assets/css/project-item.css" />
  <link rel="stylesheet" href="assets/css/form-item.css" />
  <link rel="stylesheet" href="assets/css/styles.css" />



  <title>Un projet</title>
</head>

<body>
  <header>
    <a href="/index.php">Mouctar</a>
    <?php
    include './assets/templates/nav.php'
    ?>
  </header>
  <main>
    <article id="home">
      <img src="/assets/images/<?= $project["img"] ?>" alt="<?= $project["imageAlt"] ?>">
      <h1><?= $project["titre"] ?></h1>
      <div><?= htmlspecialchars_decode($project["descrip"]) ?></div>
    </article>
    <hr>
    <h2><?= $trad["form-item"]["h2"] ?></h2>
    <form class="form-item" action="/assets/php/getComment.php" method="get">
      <div class="form-control">
        <label for="pseudo-name"><?= $trad["form-item"]["labelPseudo"] ?></label>
        <input type="text" name="pseudo-name" id="pseudo-name" placeholder="Pseudo" />
        <i class="mdi mdi-check-circle-outline"></i>
        <i class="mdi mdi-alert-circle"></i>
        <small>Error message</small>
      </div>
      <div class="form-control">
        <label for="user-msg"><?= $trad["form-item"]["labelComment"] ?></label>
        <textarea name="user-msg" id="user-msg" cols="30" rows="9" placeholder="<?= $trad["form-item"]["commentPlaceholder"] ?>"></textarea>
        <small>Error message</small>
      </div>
      <small><?= $trad["form-item"]["SuccessNotification"] ?></small>
      <button><?= $trad["form-item"]["submitBtn"] ?></button>
      <div class="form-group">
      <a href="/index.php" class="btn btn-dark btn-lg"><span class="mdi mdi-arrow-left"></span> <?= $trad["AdminProjectForm"]["go-back-btn"] ?></a>
      </div>
    </form>
  </main>
  <?php
     require_once './assets/templates/footer.php'
  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="./assets/js/main.js"></script>
  <script src="./assets/js/comment.js" type="module"></script>
  <script src="./assets/js/partage-js.js?parent=projectItem.php"></script>
 
</body>

</html>