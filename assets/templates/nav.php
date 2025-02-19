<nav>
    <ul>
        <li><a href="/index.php"><i class="mdi mdi-home-circle"></i> <?= $trad['nav']['home'] ?> </a></li>
        <li><a href="/index.php#Competences"><i class="mdi mdi-account-box"></i> <?= $trad['nav']['competences'] ?></a></li>
        <li><a href="/index.php#Formations"><i class="mdi mdi-home-circle"></i> <?= $trad['nav']['formations'] ?> </a></li>
        <li><a href="/index.php#projects" target="_blank"><i class="mdi mdi-file-account"></i> <?= $trad['nav']['projet'] ?></a></li>
        <li><a href="/index.php#Experiences"><i class="mdi mdi-shield-crown"></i> <?= $trad['nav']['expériences_pro'] ?></a></li>
        <li><a href="/contact.php"><i class="mdi mdi-account-box"></i> <?= $trad['nav']['contact'] ?></a></li>

        <li class="select">
            <select id="lang" name="lang">
                <option value="fr" <?php echo $fr_select ?>>Français</option>
                <option value="en" <?php echo $en_select ?>>English</option>
            </select>
        </li>
    </ul>
    <div>
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>
