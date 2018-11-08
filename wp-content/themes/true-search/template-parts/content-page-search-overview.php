
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
        $clientName = get_field('client_name');
        $jobTitle = get_field('job_title');
        $contentSections = get_field('content_section');
        $videoURL = get_field('video_url');
        
    ?>
    
    
                
        
    
    <header>
        <div class="search-overview-header grid1180">
            <?php if ( !post_password_required() ): ?>         
                    <?php $logo = get_field('logo'); ?>
                        
                        
                        
                        <div class="search-overview-logo">
                            <a target="_blank" href="<?php the_field('client_url'); ?>">
                            <img src="<?php echo $logo['url']; ?>" alt="">    
                            </a>
                            
                            <div>
                            <a href="https://truesearch.com" class="search-overview-explore-button btn-primary">Explore True</a>
                            </div>
                        </div>
                        
                
                <?php 
                    $socialNetworks = get_field('social_media');
                    $socialNetworks = $socialNetworks['0'];
                ?>

                

                <div class="search-overview-company-details">
                    <div class="search-overview-position"><?php echo $jobTitle; ?></div>

                    <div class="search-overview-social">
                        <?php if($socialNetworks['facebook']): ?>
                        <div><a target="blank" href="<?php echo $socialNetworks['facebook'] ?>"><i class="fa fa-lg fa-facebook"></i></a></div>
                        <?php endif; ?>
                        <?php if($socialNetworks['twitter']): ?>
                        <div><a target="blank" href="<?php echo $socialNetworks['twitter'] ?>"><i class="fa fa-lg fa-twitter"></i></a></div>
                        <?php endif; ?>
                        <?php if($socialNetworks['linkedin']): ?>
                        <div><a target="blank" href="<?php echo $socialNetworks['linkedin'] ?>"><i class="fa fa-lg fa-linkedin"></i></a></div>
                        <?php endif; ?>
                        <?php if($socialNetworks['instagram']): ?>
                        <div><a target="blank" href="<?php echo $socialNetworks['instagram'] ?>"><i class="fa fa-lg fa-instagram"></i></a></div>
                        <?php endif; ?>
                    </div>

                    </div>
                <div class="hr"></div>
            <?php endif; ?>        
        </div>
    </header><!-- .entry-header -->

    

    
    
    <div class="grid1180 search-overview-container">
        
        <div class="search-overview-sidebar">
 
            <?php if ( !post_password_required() ): ?>

            <ul class="search-overview-section-list">
                
                <?php $sidebarLoop = 1; ?>
                <?php foreach ($contentSections as $section): ?>


                    
                    <li>
                        <a class="scrollDown" href="#scrollDown<?php echo $sidebarLoop; ?>"><span><?php echo $section['section_heading']; ?></span></a>
                            
                    </li>
                    

                    <?php $sidebarLoop++; ?>
                
                <?php endforeach; ?>
            </ul>

            <?php the_field('sidebar_content'); ?>

            <?php if(have_rows('team_members')): ?>

            <div class="search-overview-team-members-sidebar">
                <h2>Search Team</h2>
                <ul class="search-overview-team-members">
                    <?php while(have_rows('team_members')) : the_row(); ?>    
                    <li>
                        <h3><?php the_sub_field('name'); ?></h3>
                        <p><?php the_sub_field('title'); ?></p>
                        <p><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></p>
                        <p><a href="tel:<?php the_sub_field('phone'); ?>"><?php the_sub_field('phone'); ?></a></p>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <?php endif; ?>

            
            <?php $printPage =  get_field('printable_version'); ?>
            <?php if($printPage): ?>


            <div class="print-page-link">
                <a target="_blank" href="<?php echo $printPage['url']; ?>"><i class="fa fa-print"></i>&nbsp;&nbsp;Print this Page</a>
            </div>
            <?php endif; ?>

            <?php endif; ?>
        </div>


        <div class="search-overview-content">
            
            <?php if ( post_password_required() ): ?>
            <h1>Password Required</h1>
            
            <?php the_content(); ?>
            <?php endif; ?>
            


            <?php if ( !post_password_required() ): ?>  
            <?php $embedCode =  wp_oembed_get($videoURL); ?>

            <?php if($embedCode): ?>
                <div class="video-container">
                <?php echo $embedCode; ?>
                </div>
            <?php endif; ?>
        
            <?php $contentLoop = 1; ?>
            <?php foreach ($contentSections as $section): ?>
                <h2 id="scrollDown<?php echo $contentLoop; ?>"><?php echo $section['section_heading'] ?></h2>
                <?php echo $section['section_content'] ?>

                <?php $contentLoop++; ?>
            <?php endforeach; ?>

            <?php if(have_rows('team_members')): ?>

            <div class="search-overview-team-members-content">
                <h2>Search Team</h2>
                <ul class="search-overview-team-members">
                    <?php while(have_rows('team_members')) : the_row(); ?>    
                    <li>
                        <h3><?php the_sub_field('name'); ?></h3>
                        <p><?php the_sub_field('title'); ?></p>
                        <p><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></p>
                        <p><a href="tel:<?php the_sub_field('phone'); ?>"><?php the_sub_field('phone'); ?></a></p>
                    </li>
                    <?php endwhile; ?>
                </ul>

                <div class="print-page-link-lower">
                    <a target="_blank" href="<?php echo $printPage['url']; ?>"><i class="fa fa-print"></i>&nbsp;&nbsp;Print this Page</a>
                </div>
            </div>

            <?php endif; ?>

            <?php endif; ?>
            
        </div>
       
        
        
    </div><!-- .entry-content -->

</article><!-- #post-## -->

<script type="text/javascript">
    
  
</script>