            </div>
        </div>   
    </div>

    <footer>
        <div class="container">
            
            <span id="footer-text">Made with <3</span>

            <?php
            // get the social links entered via the theme options page
            $googleplus = get_option('portfolio_googleplus');
            $twitter = get_option('portfolio_twitter');
            $linkedin = get_option('portfolio_linkedin');
            $github = get_option('portfolio_github');
            $dribbble = get_option('portfolio_dribbble');

            ?>

            <ul class="social-links">
                <?php if($linkedin): ?>
                <li><a href="<?php print $linkedin; ?>"><img src="<?php echo IMAGES ?>/social/linkedin-48x48.png" alt="linkedin" /></a></li>
                <?php endif; ?>
                <?php if($dribbble): ?>
                <li><a href="<?php print $dribbble; ?>"><img src="<?php echo IMAGES ?>/social/dribbble-48x48.png" alt="Dribble" /></a></li>
                <?php endif; ?>
                <?php if($twitter): ?>
                <li><a href="<?php print $twitter; ?>"><img src="<?php echo IMAGES ?>/social/twitter-48x48.png" alt="Twitter" /></a></li>
                <?php endif; ?>
                <?php if($googleplus): ?>
                <li><a href="<?php print $googleplus; ?>"><img src="<?php echo IMAGES ?>/social/google+-48x48.png" alt="GitHub" /></a></li>
                <?php endif; ?>
                <?php if($github): ?>
                <li><a href="<?php print $github; ?>"><img src="<?php echo IMAGES ?>/social/github-48x48.png" alt="Google+" /></a></li>
                <?php endif; ?>
            </ul>
            
        </div>
    </footer>

    <?php wp_footer(); ?>

    
    <?php 
    //insert the analytics code if set via the admin interface
    $analyticsCode = get_option('portfolio_analytics');
    if ($analyticsCode) {
        print $analyticsCode;
    }
    ?>
    
</body>
</html>