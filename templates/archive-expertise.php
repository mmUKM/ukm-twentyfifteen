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
    <h2><?php _e( 'Expertise', 'ukmtheme' ) ; ?></h2>
    <?php

      $expert = new WP_Query( array( 
        'post_type'       => 'expertise', 
        'posts_per_page'  => -1, 
        'orderby'         => 'menu_order', 
        'order'           => 'ASC' 
      ));

    if ( $expert->have_posts() ) : while ( $expert->have_posts() ) : $expert->the_post(); ?>
      <div class="column bottom-divider">
        <div class="col-3-12 pad-right">
          <?php
            $expertPhoto = get_post_meta($post->ID,'ut_expertise_photo',true);
            if ( $expertPhoto ) {
              echo '<img src="'.$expertPhoto.'">';
            }
            else {
              echo '<img src="'. get_template_directory_uri() .'/img/placeholder_staff.svg">';
            }
          ?>
        </div>
        <div class="col-9-12 staff-detail pad-left">
          <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>

          <ul>
            <li><?php echo get_post_meta($post->ID, 'ut_expertise_position', true); ?></li>
            <li><i class="uk-icon-phone-square"></i> <?php echo get_post_meta($post->ID, 'ut_expertise_contact', true); ?></li>
            <li><i class="uk-icon-envelope-square"></i> <?php echo get_post_meta($post->ID, 'ut_expertise_email', true); ?></li>
          </ul>
          <p>
            <strong><?php _e( 'Specialisation', 'ukmtheme' ) ?></strong><br>
            <?php echo get_post_meta($post->ID, 'ut_expertise_specialisation', true); ?>
          </p>
        </div>
      </div>
    <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.', 'ukmtheme' ); ?></p>  
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