<?php
/*
* Template Name: Blog Posts
*/
?>

<?php get_header(); ?>

<div class="blog-archive BLOGTEMPLATE">

    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>

    <div class="unit blog-archive-item two-of-three">

        <h1><span class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span></h1>
        <span class="post-info">By <?php the_author(); ?></span>

        <?php the_content('Read More'); ?>

    </div>

    <div class="unit one-of-three post-meta">

        <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('blog-post-thumb');
            }
        ?>

        <span class="post-info"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_time('l F d, Y'); ?></a></span>
        <span class="post-info"><?php wp_get_post_tags(); ?></span>

    </div>

    <?php endwhile ; else: ?>
        <p><?php _e('No posts were found. Sorry!'); ?></p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
