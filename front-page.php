<?php get_header(); ?>

            <div class="content">
                
                <div class="unit full-width in-your-face">
                
                    <h1>Hey, I'm Tony</h1>
                    
                    <p>I'm a front end web developer with a passion for all things web.</p>
                    <p>I'm currently studying Web Application Development at Plymouth University.</p>
                    <span class="button gamma force-white"><a href="#">Work with me</a></span>
                
                </div>
            
                <div class="unit three-of-four">
                
                    <p>I started</p>
                    
                    <p>Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                
                    <div class="seperator">
                        <div class="seperatorRight"></div>
                    </div>
                    
                </div>
                
                <div class="unit one-of-four">
                
                    <p>My toolkit includes:</p>
                    
                    <ul class="i-use">
                        <li><i class="fa-li fa fa-check-square"></i>HTML</li>
                        <li><i class="fa-li fa fa-check-square"></i>CSS & SASS</li>
                        <li><i class="fa-li fa fa-check-square"></i>Javascript & jQuery</li>
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
                        <h2 class="force-white"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p></p>
                    </div>
                </div>  
                
                
                
            </div>

            <?php endwhile; wp_reset_query(); ?>
                
            </div>


<?php get_footer(); ?>