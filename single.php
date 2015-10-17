<?php get_header(); ?>

                <div class="blog-archive">   
                   
                    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
        
                    <div class="unit blog-archive-item full-width blog-post">
                        
                        <h1><?php the_title(); ?></h1>

                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('blog-post-thumb');
                            }
                        ?>
                        
                        <span class="post-info"><a href="<?php the_permalink(); ?>"><?php the_time('l F d, Y'); ?></a></span>
                        <span class="post-info"><?php the_tags(); ?></span>
                    
                        <?php if ($smry = get_post_meta($post->ID, 'smry_text', true)) { ?>
                        <div class="summaryWrap">
                            <div class="sumText">
                                <p><? echo $smry; ?></p>
                             </div>
                         </div>
                         <?php } ?>
                            
                        
                        
                    </div>
                    
                    <div class="unit full-width">
                        <?php the_content('Read More'); ?>
                    </div>


                    
                    <?php endwhile ; else: ?>
                        <p><?php _e('No posts were found. Sorry!'); ?></p>
                    <?php endif; ?>
                    
                    <span class="unit previous-post"><?php previous_posts_link('Previous'); ?></span>
                    <span class="unit next-post"><?php next_posts_link('Next'); ?></span>
                
                </div>          

<?php get_footer(); ?>
