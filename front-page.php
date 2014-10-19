<?php get_header(); ?>

            <div class="content">
                
                <div class="unit full-width in-your-face">
                
                    <h1>Hey, I'm Tony</h1>
                    
                    <p>I'm a front end web developer with a passion for all things web.</p>
                    <p>I'm currently studying Web Application Development at Plymouth University.</p>
                    <?php include 'social-icons.php'; ?>
                
                </div>

                <div class="unit full-width">
                    <h2>A little bit about me</h2>
                </div>

                <div class="unit one-of-three">
                
                    <p>I created my first website way back in 2002, teaching myself the basics of web development the old 
                        fashioned way (stealing others code)</p>
                    
                    <p>Since then I've worked on a variety of projects for myself and clients, alongside my day job.</p>
                    
                </div>

                <div class="unit one-of-three">
                
                    <p>Until recently I worked in management for a national retail chain for over seven years.
                    This was great fun and I learned alot about business, but it wasn't my passion.</p>
                    <p>Realising that web development had changed in a big way, I decided to head to University to perfect my craft.</p>
                    
                    
                </div>

                <div class="unit one-of-three front-page-bio">
                
                    <p>Today I create fast and clean web sites using up to date tools and techniques. Day to day I use:</p>
                    
                    <ul>
                        <li>HTML</li>
                        <li>CSS</li>
                        <li>SASS</li>
                        <li>PHP</li>
                        <li>javascript</li>
                        <li>jQuery</li>
                        <li>Wordpress</li>
                        <li>MySQL</li>
                    </ul>
                    
                </div>

                <div class="seperator unit full-width">
                    <div class="seperatorRight"></div>
                </div>
                
                <?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 3 ) ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <div class="unit one-of-three portfolioItem">

                    <div class="view view-first">
                        <a href="<?php the_permalink(); ?>" class="portImage"><?php the_post_thumbnail('portfolio-item-thumb'); ?></a>
                        
                        <div class="mask">
                            <h2 class="force-white"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p></p>
                        </div>
                    </div>  
                </div>

                <?php endwhile; wp_reset_query(); ?>

                <div class="unit full-width homeButton">
                    <span class="button gamma force-white"><a href="http://purelywebdesign.co.uk/?post_type=portfolio">My Portfolio</a></span>
                </div>

                <div class="seperator unit full-width">
                    <div class="seperatorRight"></div>
                </div>
                
            </div>




<?php get_footer(); ?>