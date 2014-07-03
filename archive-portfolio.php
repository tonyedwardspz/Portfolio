<?php get_header(); ?>
                
            <div class="unit full-width content-block">

                <h1>My portfolio</h1>

                <p>Here you will find some of my Website design work, including projects for clients and University.</p>

                <span class="breadcrumbs">All // Website // Games // PHP // Javascript</span>

            </div>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="unit one-of-three portfolioItem">

                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('te_project'); ?></a>

                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <p><?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>">read more...</a></p>

            </div>

            <?php endwhile; ?>

            <?php endif; ?>

<?php get_footer(); ?>