<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 * 
 * @link http://codex.wordpress.org/Function_Reference/get_post_type_archive_link
 * @link http://codex.wordpress.org/Function_Reference/post_type_archive_title
 */
get_header();

  $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

  $arg = new WP_Query( array( 
    'post_type'       => 'news',
    'newscat'         => get_the_term_list( $post->ID, 'newscat' ),
    'posts_per_page'  => 10,
    'paged'           => $paged,
  ));
  
?>
<div class="wrap column">
  <article class="article col-8-12">
    <h2><?php _e( 'News:&nbsp;', 'ukmtheme' ); ?><?php single_cat_title(); ?></h2>

      <?php if ( $arg->have_posts() ) : while ( $arg->have_posts() ) : $arg->the_post(); ?>
        <div class="column bottom-divider">
          <div class="col-3-12 pad-right">
            <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail();
              }
              else {
                echo '<img src="' . get_template_directory_uri() . '/img/placeholder_thumbnail.svg" />';
              }
            ?>
          </div>
          <div class="col-9-12 pad-left">
            <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
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