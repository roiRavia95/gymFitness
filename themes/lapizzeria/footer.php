<?php wp_footer() //This connects the functions that are initiated in the footer from functions.js
?>
<footer class="footer text-center">
    <?php
    $args = array(
        'theme_location' => 'footer-menu',
        'container' => 'nav',
        'container_class' => 'footer-nav',
        "after" => "<span class='seperator'> | </span>",
    );
    wp_nav_menu($args);

    ?>

    <div class='location'>
        <p><?php echo esc_html(get_option('laPizzeria_options_address')) ?></p>
        <p>Phone Number: <?php echo esc_html(get_option('laPizzeria_options_phone')) ?></p>
    </div>
    <p class="copyright"> All rights reserved <?php echo date('Y') ?> </p>

</footer>
</body>

</html>