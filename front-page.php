<?php get_header(); ?>

    <div class="row">

        <div class="column in-your-face">

            <h1>Hey, I'm Tony</h1>
            <p>Software developer, Pasty Muncher, Hip-Hop Snob.</p>
            <p>I'm currently on placement with <a href="http://plymouthsoftware.com" title="Plymouth Software">Plymouth Software</a> as part of my degree.</p>
            <?php include 'social-icons.php'; ?>

        </div>

    </div>
    <div class="row">
        <div class="column">
            <h2>Recent Posts</h2>
        </div>
    </div>

    <?php
    // limit the loop to non custom post types (i.e only blog posts)
    query_posts( array(
          'posts_per_page' => 3,
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
                    <?php echo wp_trim_words( get_the_content(), 60, '...' ); ?>
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

    <div class="row">
        <div class="column">
            <h2>Recent projects</h2>
        </div>
    </div>


    <div class="row">

        <?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 3 ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div class="column portfolioItem">

                <div class="view view-first">
                    <a href="<?php the_permalink(); ?>" class="portImage"><?php the_post_thumbnail('portfolio-item-thumb'); ?></a>

                    <div class="mask">
                        <h2 class="force-white">
                          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p></p>
                    </div>
                </div>
            </div>

        <?php endwhile; wp_reset_query(); ?>

    </div>

    <div class="row">
        <div class="column button-wrap">
            <a href="http://purelywebdesign.co.uk/?post_type=portfolio" title="My portfolio" class="button button-blue">View Portfolio</a>
        </div>
    </div>

<?php get_footer(); ?>
