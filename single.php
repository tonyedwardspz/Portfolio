<?php get_header(); ?>

<div class="blog-archive SINGLETEMPLATE">

    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>

    <div class="unit blog-archive-item full-width blog-post">

        <h1><?php the_title(); ?></h1>
        <span class="post-info"><?php the_time('l F d, Y'); ?></span>

        <!-- <span class="post-info"><?php the_tags(); ?></span> -->

    </div>

    <div class="unit full-width blog-content">
        <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('blog-post-thumb');
            }

            the_content();
        ?>
    </div>

    <?php endwhile ; else: ?>
        <p><?php _e('No posts were found. Sorry!'); ?></p>
    <?php endif; ?>

    <div class="micro-about unit">

      <?php echo get_avatar( get_the_author_meta( 'ID' ), $size, $default, $alt, $args ); ?>

        <p>Tony Edwards is a pasty powered developer with <a href="http://plymouthsoftware.com" title="Plymouth Software Development">Plymouth Software</a>, blogger and Web Apps
           Student at Plymouth University. When not developing, I can usually be found somewhere spectacular along the Cornish Coast.
           You can catch up with me on <a href="http://twitter.com/tonyedwardspz" title="Tony on Twitter" target="_blank">Twitter</a>.</p>

    </div>

</div>

<?php get_footer(); ?>
