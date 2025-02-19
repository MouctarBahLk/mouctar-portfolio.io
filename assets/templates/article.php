<li>
<img src="/assets/images/<?= isset($project['img']) ? $project['img'] : '' ?>" alt="<?= isset($project['imageAlt']) ? $project['imageAlt'] : '' ?>" />
  <article>
    <div>
      <h2><?= $project["titre"] ?> </h2>
      <p>
        <?= htmlspecialchars_decode(substr($project["descrip"], 0, 400)) ?>...
      </p>
    </div>
    <footer>
      <a href="/projectItem.php?id=<?= $project["id"] ?>"><?= $trad["projectSection"]["viewButton"]  ?> <i class="mdi mdi-arrow-right-thick"></i></a>
    </footer>
  </article>
</li>