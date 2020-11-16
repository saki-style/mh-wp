<!----  gnav , drawer ---->
<nav class="gnav">
    <button type="button" class="drawer-toggle drawer-hamburger">
        <span class="sr-only"></span>
        <span class="drawer-hamburger-icon"></span>
    </button>
    <ul class="drawer-nav">
<?php
wp_nav_menu( array(
    'theme_location' => 'gnav',
    'menu_class' => 'gnav-list',
    'container' => false,
    'depth' => 1,
));
?>
    </ul>
</nav><!---- /gnav , drawer ---->

