<?php get_header(); ?>

<div class="blog-archive SINGLETEMPLATE">

    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>

    <div class="unit blog-archive-item full-width blog-post">

        <h1><?php the_title(); ?></h1>
        <span class="post-info"><?php the_time('l F d, Y'); ?></span>

    </div>

    <div class="unit full-width blog-content">
      <?php
          if ( has_post_thumbnail() ) {
              the_post_thumbnail('blog-post-thumb');
          }

          the_content();
      ?>
      <span class="post-info post-tags">Tags:

        <?php
          $posttags = wp_get_post_terms( get_the_ID() , 'post_tag' , 'fields=names' );
          if( $posttags ) {
            foreach ($posttags as $tag) {
              echo '<span class="post-tag">'. $tag .'</span>';
            }
          }
        ?>
      </span>
      <span class="post-share">
        <h4>Share this</h4>
        <?php
          if ( shortcode_exists( 'cresta-social-share' ) ) {
            echo do_shortcode('[cresta-social-share]');
          }
        ?>
      </span>
    </div>

    <?php endwhile ; else: ?>
        <p><?php _e('No posts were found. Sorry!'); ?></p>
    <?php endif; ?>

    <div class="micro-about unit">

      <?php echo get_avatar( get_the_author_meta( 'ID' ), $size, $default, $alt, $args ); ?>

      <p>Tony Edwards is a pasty powered developer with <a href="http://plymouthsoftware.com" title="Plymouth Software Development">Plymouth Software</a>, blogger and Web Apps
         Student at Plymouth University. When not developing, I can usually be found somewhere spectacular along the Cornish Coast.
         You can catch up with me on <a href="http://twitter.com/tonyedwardspz" title="Tony on Twitter" target="_blank">Twitter</a>.</p>

    </div>

</div>

<?php get_footer(); ?>
