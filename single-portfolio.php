<?php get_header(); ?>        

            <div class="unit full-width">
                
                <?php if (have_posts()) : ?>
					
				<?php while (have_posts()) : the_post(); ?>
				
						<h1><?php the_title(); ?></h1>

							<?php the_post_thumbnail('te_project'); ?>
						
							<?php the_content('Read the rest of this entry &raquo;'); ?>

							<?php
								if(function_exists('te_projects_get_link')){
									$te_link= te_projects_get_link($post->ID);

									if($te_link){
							?>
									<a href="<?php echo $te_link; ?>" class="button">Visit the Site</a>
							<?php 
									}
								} ?>

				<?php endwhile; ?>
                
                <?php endif; ?>
                
            </div>

<?php get_footer(); ?>