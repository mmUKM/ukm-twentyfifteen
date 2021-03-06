<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @since 1.0
 */
get_header(); ?>
<div class="wrap column">
  <article class="article col-12-12">
    <h2><?php _e( 'Publication', 'ukmtheme' ); ?></h2>
      <?php
      $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

      $arg = new WP_Query( array( 
        'post_type'       => 'publication',
        'posts_per_page'  => 10,
        'paged'           => $paged,
      ));
      
      if ( $arg->have_posts() ) : while ( $arg->have_posts() ) : $arg->the_post(); ?>
        <div class="column bottom-divider">
          <div class="col-2-12 pad-right">
            <?php
              $pub_cover = get_post_meta( get_the_ID(),'ut_publication_cover',true );
              if ( $pub_cover ) { ?>
              <img src="<?php echo $pub_cover; ?>" width="130" height="165" alt="<?php the_title(); ?>">
              <?php }

              else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_publication.svg" width="130" height="165">
              <?php }
            ?>
          </div>
          <div class="col-10-12 pad-left">
            <h3><?php the_title(); ?></h3>
            <table>
              <tr><td><?php _e('Author','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_publication_author', true ); ?></td></tr>
              <tr><td><?php _e('Publisher','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_publication_publisher', true ); ?></td></tr>
              <tr><td><?php _e('Year','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_publication_year', true ); ?></td></tr>
              <tr><td><?php _e('Number of Pages','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_publication_pages', true ); ?></td></tr>
              <tr><td><?php _e('Reference/Download','ukmtheme'); ?></td><td>:&nbsp;<a href="<?php echo get_post_meta( get_the_ID(), 'ut_publication_reference', true ); ?>"><?php _e('Click here','ukmtheme') ?></a></td></tr>
            </table>
          </div>
        </div>
      <?php endwhile; else: ?>
        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
        <?php get_search_form(); ?>
      <?php endif; ?>
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
</div>
<?php get_footer(); ?>