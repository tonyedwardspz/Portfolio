<?php get_header(); ?>
    <div class="row">
        <div class="column content-block ARCHIVEPORTFOLIO">

            <h1>My work</h1>

            <p>Here you will find some of my Website design work, including projects for clients and University.</p>

            <ul class="filterList">
                <li class="filter" data-filter="all">All</li>
                <li class="filter" data-filter=".Website">Websites</li>
                <li class="filter" data-filter=".WordPress">WordPress</li>
                <li class="filter" data-filter=".Games">Games</li>
                <li class="filter" data-filter=".University">University Projects</li>
                <li class="filter" data-filter=".Other">Other</li>
            </ul>

        </div>
    </div>

    <div id="mixPortfolio" class="portfolioWrapper">
    
        <?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 12 ) ); ?>
        <?php if (have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

        <div class="portfolioItem mix <?php echo custom_taxonomies_terms_links();?>">
            <div class="mask">
                <a href="<?php the_permalink(); ?>" class="portImage">
                    <?php the_post_thumbnail('portfolio-item-thumb'); ?>
                </a>
            </div>

            <div class="portfolio-overlay">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>
        </div>

        <?php endwhile; wp_reset_query();  endif; ?>
    </div>

<?php get_footer(); ?>
