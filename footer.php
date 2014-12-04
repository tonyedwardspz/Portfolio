            </div>
        </div>   
    </div>

    <footer>
        <div class="container">
            
            <span id="footer-text">Made with love and coffee by
                <div itemscope itemtype="http://data-vocabulary.org/Person">
                    <a href="<?php echo home_url(); ?>" title="Plymouth Web Developer" itemprop="url">
                        <span itemprop="name">Tony Edwards</span></a>
                </div>
            </span>

            <?php include 'social-icons.php'; ?>
            
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