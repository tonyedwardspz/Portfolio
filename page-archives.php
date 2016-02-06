<?php
/*
* Template Name: Archives
*/
?>
<?php get_header(); ?>

                <div class="blog-archive PAGEARCHIVES row">

                    <div class="blog-archive-item column">

                        <h2>Archives by Month:</h2>
                        <ul>
                            <?php wp_get_archives('type=monthly'); ?>
                        </ul>

                        <h2>Archives by Subject:</h2>
                        <ul>
                            <?php wp_list_categories('hierarchical=0&title_li='); ?>
                        </ul>

                    </div>
                </div>


<?php get_footer(); ?>
