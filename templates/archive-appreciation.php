<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="wrap column">
  <article class="article col-8-12">
    <h2><?php echo __( 'Appreciation', 'ukmtheme' ) ?></h2>
      <?php
      
        $appreciation = new WP_Query( array( 
          'post_type'       => 'appreciation', 
          'posts_per_page'  => 10,
        ));
      
        if ( $appreciation->have_posts() ) : while ( $appreciation->have_posts() ) : $appreciation->the_post(); ?>
        <div class="column bottom-divider">
          <blockquote><?php global $post; echo get_post_meta($post->ID, 'ut_appreciation_greeting', true); ?></blockquote>
          <span style="float:right;text-align:right;">
            <i class="uk-icon-gift"></i>&nbsp;<?php global $post; echo get_post_meta($post->ID, 'ut_appreciation_ptj', true); ?><br/>
            <?php global $post; echo get_post_meta($post->ID, 'ut_appreciation_date', true); ?>
          </span>
        </div>
        <?php endwhile; else: ?>
        <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
  <aside class="aside col-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?>