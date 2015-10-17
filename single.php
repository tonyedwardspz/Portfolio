<?php get_header(); ?>

                <div class="blog-archive SINGLETEMPLATE">   
                   
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
                    
                    <div class="micro-about unit">

                      <?php echo get_avatar( get_the_author_meta( 'ID' ), $size, $default, $alt, $args ); ?>
                      
                        <p>Tony Edwards is a pasty powered software developer with Plymouth Software, blogger and Web Applications Development
                           Student at Plymouth University. When not developing, I can usually be found near the coast somewhere is Cornwall. 
                           You can catch up with me on <a href="http://twitter.com/tonyedwardspz" title="Tony on Twitter" target="_blank">Twitter</a>.</p>

                    </div>
                
                </div>          

<?php get_footer(); ?>
