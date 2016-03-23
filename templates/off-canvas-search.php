<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 */
?>
<a class="top-nav-search" data-uk-offcanvas="{target:'#ut-search'}"><i class="uk-icon-search"></i></a>
<div id="ut-search" class="uk-offcanvas">
  <div class="uk-offcanvas-bar">
    <form class="uk-search" action="<?php echo home_url( '/' ); ?>">
      <input class="uk-search-field" type="search" placeholder="<?php _e( 'Search...','ukmtheme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s">
    </form>
  </div>
</div>