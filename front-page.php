<?php get_header(); ?>

            <div class="content">
                
                <div class="unit full-width in-your-face">
                
                    <h1>Hey, I'm Tony</h1>
                    
                    <p>I have a passion for creating interesting things that use the internet.</p>
                    <p>I study Web Application Development at Plymouth University.</p>
                    <span class="button gamma force-white"><a href="#">Work with me</a></span>
                
                </div>
                
                <div class="unit full-width">
                    
                    <h2>What i'm workin on now.</h2>
                    
                </div>
            
                <div class="unit one-of-three">
                
                    <p>Donec id elit non <a href="http://www.thisdomain.co.uk">mi porta gravida</a> at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                    
                    <span class="button gamma force-white"><a href="#">Work with me</a></span>
                
                    <div class="seperator">
                        <div class="seperatorRight"></div>
                    </div>
                    
                </div>
                
                <div class="unit one-of-three">
                
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                
                    <div class="seperator">
                        <div class="seperatorRight"></div>
                    </div>
                    
                </div>
                
                <div class="unit one-of-three">
                
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                
                    <div class="seperator">
                        <div class="seperatorRight"></div>
                    </div>
                    
                </div>  
                
                <div class="unit full-width">
                    
                    <h2>What i'm workin on now.</h2>
                    
                </div>
                
                <?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 3 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


            <div class="unit one-of-three portfolioItem">

                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('te_project'); ?></a>

                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <br />
                <span class="button gamma force-white"><a href="<?php the_permalink(); ?>">View Project</a></span>

            </div>

            <?php endwhile; wp_reset_query(); ?>
                
            </div>


<?php get_footer(); ?>