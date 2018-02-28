<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="entry-header-inner grid1060">
            <?php
                //variables
                $headerintrotext = get_field('header_intro_text');
            ?>

            <h1 class="entry-title headline-style-1"><?php the_title(); ?></h1>
            <?php if( $headerintrotext ): ?>
                <div class="header-intro-text"><?php echo $headerintrotext; ?></div>
            <?php endif; ?>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">

        <div class="team-overview-grid">
        <?php
            $teamMembers = new WP_Query(array(
            'post_type' => 'team-member',
            'posts_per_page' => -1
            ) );

        ?>

        <!--Partners-->
            <?php while ($teamMembers->have_posts()) : $teamMembers->the_post(); ?>

                <?php
                    //variables
                    $bwphoto = get_field('bw_team_member_photo');
                    $tmt = get_field('team_member_title');
                ?>

                <div class="grid-team-member lazy" style="<?php if( $bwphoto ) : ?> background-image: url(<?php echo $bwphoto; endif; ?>);">
                    <a href="<?php the_permalink();?>" class="featured-red-mask">
                        <div class="featured-team-member-mask-inner">
                            <h2 class="headline-style-11"><?php the_title(); ?></h2>
                            <?php if( $tmt ) : ?><span class="team-overview-team-title"><?php echo $tmt; ?></span><?php endif; ?>
                            <span class="ghost-button1">View Profile</span>
                        </div>
                    </a>
                </div>
                <h2 class="headline-style-7 mobile-title"><a href="<?php the_permalink(); ?>" class="no-uline"><?php the_title(); ?></a></h2>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        </div>

    </div><!-- .entry-content -->
</article><!-- #post-## -->