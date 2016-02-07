<?php get_header(); 

			if (have_posts()) : ?>
					
				<?php while (have_posts()) : the_post(); ?>

				<div class="row">

					<div class="column column-66">
					
							<h1><?php the_title(); ?></h1>
							
							<p><?php the_content('Read More'); ?></p>
								
					</div>

					<div class="column column-33">

						<h2>Skills, Tools and Libraries</h2>

						<?php echo custom_taxonomies_skills();?>

						<?php
							if(function_exists('te_projects_get_link')){
								$te_link = te_projects_get_link($post->ID);

								if($te_link) { ?>
						<span class="button button-outline"><a href="<?php echo $te_link; ?>">Visit the Site</a></span>

					</div>

					<?php 
						}
					} ?>

				</div>

				<div class="row">
					<div class="column sliderWrap">
						<div class="slider">
							<ul>
							    <?php getAttachedImages(); ?>
							</ul>
						</div>
					</div>
				</div>

				<?php endwhile; endif; ?>

<?php get_footer(); ?>
