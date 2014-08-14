<?php get_header(); ?>
                
            <div class="unit full-width content-block">

                <h1>My work</h1>

                <p>Here you will find some of my Website design work, including projects for clients and University.</p>

                <!--<span class="breadcrumbs"><a href="#" data-value="ALL" class="porfolioCategory">All</a> // <a href="#" data-value="HTML" class="porfolioCategory">HTML</a> // CSS // PHP // Javascript // Wordpress</span>-->
                <ul class="filterList">
                    <li class="filter" data-filter="all">All</li>
                    <li class="filter" data-filter=".Website">Websites</li>
                    <li class="filter" data-filter=".Wordpress">Wordpress</li>
                    <li class="filter" data-filter=".Games">Games</li>
                    <li class="filter" data-filter=".Other">Other</li>
                <ul>

            </div>
            <div id="mixPortfolio" class="portfolioWrapper">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="unit one-of-three portfolioItem mix <?php echo custom_taxonomies_terms_links();?>">

                <div class="view view-first">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('te_project'); ?></a>
                    
                    <div class="mask">
                        <h2 class="force-white"><a href="<?php the_permalink(); ?>">View Project</a></h2>
                        <p></p>
                    </div>
                </div>

                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <p><?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>">read more...</a></p>

            </div>

            <?php endwhile; ?>

            <?php endif; ?>

        </div>

<?php get_footer(); ?>