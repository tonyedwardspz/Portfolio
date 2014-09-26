<?php get_header(); ?>
                
            <div class="unit full-width content-block">

                <h1>My work</h1>

                <p>Here you will find some of my Website design work, including projects for clients and University.</p>

                <!--<span class="breadcrumbs"><a href="#" data-value="ALL" class="porfolioCategory">All</a> // <a href="#" data-value="HTML" class="porfolioCategory">HTML</a> // CSS // PHP // Javascript // Wordpress</span>-->
                <ul class="filterList">
                    <li class="filter" data-filter="all">All</li>
                    <li class="filter" data-filter=".Website">Websites</li>
                    <li class="filter" data-filter=".WordPress">WordPress</li>
                    <li class="filter" data-filter=".Games">Games</li>
                    <li class="filter" data-filter=".University">University Projects</li>
                    <li class="filter" data-filter=".Other">Other</li>
                <ul>

            </div>
            <div id="mixPortfolio" class="portfolioWrapper">

            <?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 12 ) ); ?>
                <?php //while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <?php if (have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

            <div class="unit one-of-three portfolioItem mix <?php echo custom_taxonomies_terms_links();?>">

                <div class="view view-first">
                <a href="<?php the_permalink(); ?>" class="portImage"><?php the_post_thumbnail('te_project'); ?></a>
                    
                    <div class="mask">
                        <h2 class="force-white"><a href="<?php the_permalink(); ?>">View Project</a></h2>
                        <p></p>
                    </div>
                </div>

                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <p><?php get_smry_text($post); ?></p>

            </div>

            <?php endwhile; wp_reset_query();?>

            <?php endif; ?>

        </div>

<?php get_footer(); ?>