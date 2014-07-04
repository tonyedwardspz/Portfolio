<?php get_header(); ?>

                <div class="blog-archive">   
                   
                    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
        
                    <div class="unit blog-archive-item full-width">
                        
                        <h2><span class="post-title"><?php the_title(); ?></span></h2>
                        
                        <?php the_content('Read More'); ?>
                        
                    </div>
                    
                    <?php endwhile ; else: ?>
                        <p><?php _e('No posts were found. Sorry!'); ?></p>
                    <?php endif; ?>
                
                </div>            

<?php get_footer(); ?>