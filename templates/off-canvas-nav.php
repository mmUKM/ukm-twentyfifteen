<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 */
 ?>
<a href="#main-nav" class="main-nav-menu-icon" data-uk-offcanvas ><span class="sm-hidden">MENU</span> <i class="uk-icon-bars"></i></a>
<div id="main-nav" class="uk-offcanvas">
  <div class="uk-offcanvas-bar">
    <?php
      wp_nav_menu(array(
        'theme_location'    => 'main',
        'menu'              => 'Main Navigation',
        'container_id'      => 'cssmenu',
        'fallback_cb'       => false,
        'walker'            => new CSS_Menu_Maker_Walker()
      ));
    ?>
  </div>
</div>