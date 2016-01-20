<?php 
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

get_header(); 
?>

<div class="blog-archive INDEX">

    <?php
    // limit the loop to non custom post types (i.e only blog posts)
    query_posts( array(
          'posts_per_page' => 7,
          'post_type' => 'post',
          'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
     ));

    if (have_posts() ) : while (have_posts() ) : the_post(); ?>

    <div class="blog-snippet">
      <div class="row">
          <div class="column">
              <h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
          </div>
      </div>

      <div class="row">
          <div class="column column-75">
              <span class="post-info"><?php the_time('l F d, Y'); ?></span>
              <?php the_excerpt(); ?>
              <div class="button-wrap">
                  <a href="<?php the_permalink(); ?>" class="button button-blue" title="<?php the_title(); ?>">Read More &raquo;</a>
              </div>
          </div>
          <div class="column">
              <?php if ( has_post_thumbnail() ) the_post_thumbnail('blog-archive-thumb'); ?>

          </div>
      </div>
    </div>

    <?php endwhile ; else: ?>
        <p><?php _e('No posts were found. Sorry!'); ?></p>
    <?php endif; ?>

    <div class="pagination">
         <?php
            $prev = get_previous_posts_link();
            if ( !empty($prev) ) { ?>
              <div class="button-wrap previous-post">
                  <?php previous_posts_link('Previous'); ?>
              </div>
        <?php } ?>
        <?php
            $next = get_next_posts_link();
            if ( !empty($next) ) { ?>
              <div class="button-wrap next-post">
                  <?php next_posts_link('Next'); ?>
              </div>
        <?php } ?>
    </div>

    <?php wp_reset_query(); ?>

</div>

<?php get_footer(); ?>
