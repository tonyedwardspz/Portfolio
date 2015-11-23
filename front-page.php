<?php get_header(); ?>

            <div class="unit full-width in-your-face">

                <h1>Hey, I'm Tony</h1>

                <p>Software developer, Pasty Muncher, Hip-Hop Snob.</p>
                <p>I'm currently on placement with <a href="http://plymouthsoftware.com" title="Plymouth Software">Plymouth Software</a> as part of my degree.</p>
                <?php include 'social-icons.php'; ?>

            </div>

            <div class="unit full-width">
                <h2>A little bit about me</h2>
            </div>

            <div class="unit two-of-three">

                <p>I created my first website way back in 2002, teaching myself the basics the old fashioned way (view source).
                 I caught the bug straight away, working on projects for myself and clients, alongside my day job.</p>

                <p>Following a 7 year stint in retail management, I decided to return to web development. Realising
                that web development had changed in a big way, I decided to head to University to learn the craft.</p>

                <p>Today I create both web and native application as part of a close knit team at Plymouth Software.</p>

                <span class="button gamma force-white">
                    <a href="http://purelywebdesign.co.uk/about-me" title="About me">About me</a>
                </span>

            </div>

            <div class="unit one-of-three front-page-bio">

                <p>I create web sites and software using up to date tools and techniques. I have been know to dabble in:</p>

                <ul>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>PHP</li>
                    <li>JavaScript</li>
                    <li>Ruby on Rails</li>
                    <li>Wordpress</li>
                    <li>Swift</li>
                </ul>

            </div>

            <div class="seperator unit full-width">
                <div class="seperatorRight"></div>
            </div>

            <div class="unit full-width">
                <h2>Recent projects</h2>
            </div>

            <?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 3 ) ); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div class="unit one-of-three portfolioItem">

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

            <div class="unit full-width homeButton">

                <span class="button gamma force-white">
                    <a href="http://purelywebdesign.co.uk/?post_type=portfolio" title="My portfolio">View Portfolio</a>
                </span>

            </div>

<?php get_footer(); ?>
