<?php get_header(); ?>

<div class="blog-archive BLOGROLL">

    <?php
    // limit the loop to non custom post types (i.e only blog posts)
    query_posts( array(
          'posts_per_page' => 7,
          'post_type' => 'post',
          'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
     ));

    if (have_posts() ) : while (have_posts() ) : the_post(); ?>

    <div class="blog-item-wrap">

      <div class="unit blog-archive-item two-of-three">

          <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <span class="post-info"><?php the_time('l F d, Y'); ?></span>

          <?php the_excerpt(); ?>

          <span class="button force-white">
            <a class="button force-white" href="<?php the_permalink(); ?>">Read More &raquo;</a>
          </span>

      </div>

      <div class="unit one-of-three post-meta">

          <?php
              if ( has_post_thumbnail() ) {
                  the_post_thumbnail('blog-archive-thumb');
              }
          ?>


          <span class="post-info"><?php the_tags(); ?></span>

      </div>
  </div>

    <?php endwhile ; else: ?>
        <p><?php _e('No posts were found. Sorry!'); ?></p>
    <?php endif; ?>

    <div class="pagination">
         <?php
            $prev = get_previous_posts_link();
            if ( !empty($prev) ) { ?>
                <span class="unit previous-post button force-white"><?php previous_posts_link('Previous'); ?></span>
        <?php } ?>
        <?php
            $next = get_next_posts_link();
            if ( !empty($next) ) { ?>
                <span class="unit next-post button force-white"><?php next_posts_link('Next'); ?></span>
        <?php } ?>
    </div>

    <?php wp_reset_query(); ?>

</div>

<?php get_footer(); ?>
