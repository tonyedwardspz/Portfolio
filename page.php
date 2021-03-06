<?php 
/**
 * The default single page template
 */
get_header(); 
?>

    <div class="blog-archive PAGE row">

        <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>

        <div class="column blog-archive-item">

            <h1><span class="post-title"><?php the_title(); ?></span></h1>

            <?php the_content('Read More'); ?>

        </div>

        <?php endwhile ; else: ?>
            <p><?php _e('No posts were found. Sorry!'); ?></p>
        <?php endif; ?>

    </div>

<?php get_footer(); ?>
