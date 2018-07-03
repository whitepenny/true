


<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <h1><?php single_cat_title(); ?></h1>



            <p><?php echo category_description(); ?></p>

            <?php echo do_shortcode('[searchandfilter id="24"]' ); ?>

            <div class="placement-results" id="filterResults">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                    
                    <div class="placement-result">
                    <h1><?php the_title(); ?></h1>
                    </div>
                
            <?php endwhile; ?>
            <?php else: ?>

                No Posts
            <?php endif; ?>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>