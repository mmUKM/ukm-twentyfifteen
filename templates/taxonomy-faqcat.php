<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @since 1.0
 */
get_header(); 

  $arg = new WP_Query( array( 
    'post_type'       => 'faq',
    'faqcat'        => get_the_term_list( $post->ID, 'faqcat' ),
    'posts_per_page'  => -1, 
    'orderby'         => 'menu_order',
    'order'           => 'ASC' 
  ));
  
?>
<div class="wrap column">
  <article class="article col-8-12">
  <h2><?php echo __( 'Frequently Asked Questions', 'ukmtheme' ) ?>&nbsp;:&nbsp;<?php single_cat_title(); ?></h2>
    <ol class="ut-faq">
      <?php while ( $arg->have_posts() ) : $arg->the_post(); ?>
        <li>
          <a data-uk-toggle="{target:'#ut-faq-<?php echo get_the_ID(); ?>'}"><?php the_title(); ?></a>
          <div id="ut-faq-<?php echo get_the_ID(); ?>" class="uk-panel uk-panel-box uk-hidden">
            <?php the_content(); ?>
          </div>
        </li>
      <?php endwhile; ?>
    </ol>
  </article>
  <aside class="aside col-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?>