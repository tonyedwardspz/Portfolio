<?php get_header(); ?>

            <div class="content">
                
                <div class="unit full-width in-your-face">
                
                    <h1>Hey, I'm Tony</h1>
                    
                    <p>I have a passion for creating interesting things that use the internet.</p>
                    <p>I study Web Application Development at Plymouth University.</p>
                    <span class="button gamma force-white"><a href="#">Work with me</a></span>
                
                </div>
            
                <div class="unit three-of-four">
                
                    <p>Donec id elit non <a href="http://www.thisdomain.co.uk">mi porta gravida</a> at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    
                    <p>Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                
                    <div class="seperator">
                        <div class="seperatorRight"></div>
                    </div>
                    
                </div>
                
                <div class="unit one-of-four">
                
                    <p>I reguarly use...</p>
                    
                    <ul class="i-use">
                        <li><i class="fa-li fa fa-check-square"></i>HTML</li>
                        <li><i class="fa-li fa fa-check-square"></i>CSS</li>
                        <li><i class="fa-li fa fa-check-square"></i>Javascript</li>
                        <li><i class="fa-li fa fa-check-square"></i>PHP</li>
                        <li><i class="fa-li fa fa-check-square"></i>Wordpress</li>
                    </ul>
                    
                    <div class="seperator">
                        <div class="seperatorRight"></div>
                    </div>
                    
                </div>
                
                <div class="unit full-width">
                    
                    <h2>My Work</h2>
                    
                </div>
                
                <?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 3 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <div class="unit one-of-three portfolioItem">

                <div class="view view-first">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('te_project'); ?></a>
                    
                    <div class="mask">
                        <h2 class="force-white"><a href="<?php the_permalink(); ?>">View Project</a></h2>
                        <p></p>
                    </div>
                </div>  
                
                <div class=" view-project">

                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <br />
                    <span class="button gamma force-white"><a href="<?php the_permalink(); ?>">View Project</a></span>
                </div>

            </div>

            <?php endwhile; wp_reset_query(); ?>
                
            </div>


<?php get_footer(); ?>