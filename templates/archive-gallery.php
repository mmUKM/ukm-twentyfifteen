<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @since 1.0
 */
 get_header(); ?>

 <div class="wrap column">
  <article class="article col-8-12">
    <h2><?php _e( 'Gallery', 'ukmtheme' ) ; ?></h2>

    <?php
    
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

    $arg = new WP_Query( array( 
      'post_type'       => 'gallery',
      'posts_per_page'  => 10,
      'paged'           => $paged
    ));
    
      if ( $arg->have_posts() ) : while ( $arg->have_posts() ) : $arg->the_post();
    ?>
    <div class="column bottom-divider">
      <div class="col-3-12 pad-right">
        <?php
          $gal_cover = get_post_meta($post->ID,'ut_gallery_cover',true);
          if ( $gal_cover ) { ?>
        <img src="<?php echo $gal_cover; ?>" width="300" height="300" alt="Gallery Cover">
          <?php }

          else { ?>
          <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_thumbnail.svg" width="600" height="480" alt="Gallery Cover">
          <?php }
        ?>
      </div>
      <div class="col-9-12 pad-left">
        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php _e('Date:&nbsp;','ukmtheme'); ?><?php echo get_post_meta($post->ID, 'ut_gallery_date', true); ?><br/>
        <?php _e('Photo by:&nbsp;','ukmtheme'); ?><?php echo get_post_meta($post->ID, 'ut_gallery_photographer', true); ?></p>
      </div>
    </div>
    <?php endwhile; else: ?>
      <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
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