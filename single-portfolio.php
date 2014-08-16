<?php get_header(); 




?>        

          
                
                <?php if (have_posts()) : ?>
					
				<?php while (have_posts()) : the_post(); ?>

				<div class="unit three-of-five">
				
						<h1><?php the_title(); ?></h1>
						
						<?php the_content(); ?>
							
				</div>

				<div class="unit two-of-five skills-tools">

					<h2>Skills, Tools and Libraries</h2>

					<?php echo custom_taxonomies_skills();?>

					<?php
						if(function_exists('te_projects_get_link')){
							$te_link = te_projects_get_link($post->ID);

							if($te_link) { ?>
					<span class="button gamma force-white"><a href="<?php echo $te_link; ?>">Visit the Site</a></span>

					<?php 
						}
					} ?>

				</div>

				<!-- <div class="unit full-width"> -->
				<div class="unit full-width sliderWrap">
					<div class="slider">
						<ul>
						    <?php getAttachedImages(); ?>

						</ul>
					</div>
				</div>


				<!-- </div> -->

				<?php endwhile; ?>
                
                <?php endif; ?>
                
            

<?php get_footer(); ?>