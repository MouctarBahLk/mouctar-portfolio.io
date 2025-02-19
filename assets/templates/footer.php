<!--footer-->
<footer>
    <div class="footer-container">
        <div class="footer-column">
            <h3><?php echo $trad['footer']['about_me']['title']; ?></h3>
            <p><?php echo $trad['footer']['about_me']['description']; ?></p>
        </div>
        <div class="footer-column">
            <h3><?php echo $trad['footer']['quick_links']['title']; ?></h3>
            <ul>
                <?php foreach ($trad['footer']['quick_links']['links'] as $link): ?>
                    <li><a href="<?php echo $link['url']; ?>"><?php echo $link['text']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="footer-column">
            <h3><?php echo $trad['footer']['contact_me']['title']; ?></h3>
            <p><?php echo $trad['footer']['contact_me']['address']; ?></p>
            <p><?php echo $trad['footer']['contact_me']['phone']; ?></p>
            <p><?php echo $trad['footer']['contact_me']['email']; ?></p>
        </div>
    </div>
    <div class="footer-bottom">
        <p><?php echo $trad['footer']['rights_reserved']; ?></p>
    </div>
</footer>
