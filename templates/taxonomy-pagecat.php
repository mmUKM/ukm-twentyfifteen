<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="column">
  <article class="article col-12-12">
    <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>

    <?php endwhile;?>
  </article>
</div>
<?php get_footer(); ?>