


<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">



            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <div class="entry-header-inner grid2400">
                        
                        <h1 class="entry-title headline-style-2"><?php single_cat_title(); ?></h1>
                        
                            <div class="header-intro-text"><?php echo category_description(); ?></div>
                        
                    </div>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <div class="client-overview-arrow"></div>
                    
                    <div style="text-align: center;">
                    <div class="placement-filter-toolbar">
                    <?php echo do_shortcode('[searchandfilter id="2164"]' ); ?>
                    </div>
                    </div>
                    
                    <div class="grid2400">    
                        
                        <div class="placement-previews" id="filterResults">

                            <?php if(have_posts()): ?>
                                <?php while( have_posts() ): the_post(); 

                            
                                ?>

                                <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

                                
                                <div class="placement-preview">
                                    <div class="placement-preview__container">
                                        <div class="placement-preview__image">
                                            <img src="<?php echo $thumb['0']; ?>" alt="">
                                        </div>
                                        <div class="placement-preview__content">
                                            <h3><?php the_field('placement_position'); ?></h3>
                                            <ul>
                                                <li><?php $practice = get_the_terms($post, 'placement_practice'); echo $practice[0]->name; ?></li>
                                                <li><?php $asset = get_the_terms($post, 'placement_asset'); echo $asset[0]->name; ?></li>
                                                <li><?php $location = get_the_terms($post, 'placement_location'); echo $location[0]->name; ?></li>
                                                <?php while(have_rows('placement_recruiter')) : the_row(); ?>
                                                <li><a href="mailto: <?php the_sub_field('email'); ?>"><?php the_sub_field('name'); ?></a></li>
                                                <?php endwhile; ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <?php endwhile; ?>
                            <?php else: ?>
                                <div class="placement-no-results">
                                    <h2>No Results</h2>
                                    <p>There are no results that match the criteria.</p>
                                </div>
                            <?php endif; ?>

                            

                            
                        </div>

                    </div>
                    
                </div><!-- .entry-content -->

            </article><!-- #post-## -->


        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>