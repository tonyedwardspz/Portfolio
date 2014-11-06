<?php get_header(); ?>

            <div class="content">
                
                <div class="unit full-width in-your-face">
                
                    <h1>Hey, I'm Tony</h1>
                    
                    <p>I'm a student Web Developer trying to absorbing everything I can about the industry.</p>
                    <p>I'm currently studying for a degree in Web Application Development at Plymouth University.</p>
                    <?php include 'social-icons.php'; ?>
                
                </div>

                <div class="unit full-width">
                    <h2>A little bit about me</h2>
                </div>

                <div class="unit two-of-three">
                
                    <p>I created my first website way back in 2002, teaching myself the basics the old fashioned way (view source).
                     I caught the bug straight away, working on projects for myself and clients, alongside my day job.</p>
                
                    <p>Until recently I was a manager for a national retail chain for seven years.
                    This was great fun and I learned alot about business, but I didn't fancy doing it for another 40 years.</p>

                    <p>Realising that web development had changed in a big way, I decided to head to University to learn the craft.</p>
                    
                    
                </div>

                <div class="unit one-of-three front-page-bio">
                
                    <p>I'm learning to create web sites and software using up to date tools and techniques. If I had to choose, I'd use:</p>
                    
                    <ul>
                        <li>HTML</li>
                        <li>CSS</li>
                        <li>SASS</li>
                        <li>PHP</li>
                        <li>JavaScript</li>
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