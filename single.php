<?php get_header(); ?>


                <div class="blog-archive">   
                   
                    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
        
                    <div class="unit blog-archive-item blog-content-width">
                        
                        <h1><span class="post-title"><?php the_title(); ?></span></h1>
                    
                        <div class="summaryWrap">
                            <div class="sumText">
                                <p><?php get_smry_text($post); ?></p>
                            </div>
                        </div>
                            
                        <?php the_content('Read More'); ?>
                        
                    </div>
                    
                    <div class="unit side-width post-meta">
                        
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('blog-post-thumb');
                            }
                        ?>
                        
                        <span class="post-info"><a href="<?php the_permalink(); ?>"><?php the_time('l F d, Y'); ?></a></span>
                        <span class="post-info">Tag, another tag, i love tags</span>
                    
                    </div>
                    
                    <?php endwhile ; else: ?>
                        <p><?php _e('No posts were found. Sorry!'); ?></p>
                    <?php endif; ?>
                    
                    
                    
                    <span class="unit previous-post"><?php previous_posts_link('Previous'); ?></span>
                    <span class="unit next-post"><?php next_posts_link('Next'); ?></span>
                
                </div>

                

<?php get_footer(); ?>