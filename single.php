<?php get_header(); ?>

                <div class="blog-archive">   
                   
                    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
        
                    <div class="unit blog-archive-item two-of-three">
                        
                        <h1 id="fitTitle"><span class="post-title"><?php the_title(); ?></span></h1>
                    
                        <?php if ($smry = get_post_meta($post->ID, 'smry_text', true)) { ?>
                        <div class="summaryWrap">
                            <div class="sumText">
                                <p><? echo $smry; ?></p>
                             </div>
                         </div>
                         <?php } ?>
                            
                        <?php the_content('Read More'); ?>
                        
                    </div>
                    
                    <div class="unit one-of-three post-meta">
                        
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('blog-post-thumb');
                            }
                        ?>
                        
                        <span class="post-info"><a href="<?php the_permalink(); ?>"><?php the_time('l F d, Y'); ?></a></span>
                        <span class="post-info"><?php the_tags(); ?></span>

                        <div class="advert">

                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- PWD - Responsive -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-7067632003386523"
                                 data-ad-slot="9873544474"
                                 data-ad-format="auto"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>

                        </div>
                    
                    </div>


                    
                    <?php endwhile ; else: ?>
                        <p><?php _e('No posts were found. Sorry!'); ?></p>
                    <?php endif; ?>
                    
                    <span class="unit previous-post"><?php previous_posts_link('Previous'); ?></span>
                    <span class="unit next-post"><?php next_posts_link('Next'); ?></span>
                
                </div>          

<?php get_footer(); ?>