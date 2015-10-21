    <aside class="unit one-of-three">
        <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Primary Sidebar') ) : ?>
        
        <div class="widget">
            <?php 
                if (function_exists("popular_popularity_list")) {
                   popular_popularity_list();
                } ?>
            
        </div>
        <?php endif; ?>
    </aside>
