<?php get_header(); ?>

                <div class="blog-archive">   
                   
                    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
        
                    <div class="unit blog-archive-item two-of-three">
                        
                        <h1><span class="post-title"><?php the_title(); ?></span></h1>
                        
                        <?php the_content('Read More'); ?>
                        
                    </div>
                    
                    <?php endwhile ; else: ?>
                        <p><?php _e('No posts were found. Sorry!'); ?></p>
                    <?php endif; ?>

                    <?php get_sidebar(); ?>  
                
                </div>   



<?php get_footer(); ?>