<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 * 
 * Template Name: Page with Left Sidebar
 */
get_header(); ?>
<div class="wrap column">
  <aside class="aside col-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
  <article class="article col-8-12">
    <?php while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>

    <?php endwhile;?>
    <?php get_template_part('templates/content','edit' ); ?>
  </article>
</div>
<?php get_footer(); ?>