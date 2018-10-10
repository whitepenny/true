<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


  <div class="home-slider-container">
    <div class="home-slider">

      <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
      <div class="home-slide">
      	<header class="entry-header" <?php if( $feat_image ) : ?>style="background-image: url(<?php echo $feat_image; ?>); <?php endif; ?>">
      		<div class="entry-header-inner grid1060">
      			<?php
      				//variables
      				$headerintrotext = get_field('header_intro_text');
      			?>
      			<h1 class="entry-title headline-style-2">We&#8217;re
      				<!--<span class="quotes"></span>-->
      				<span class="quotes quote1">Innovative</span>
      				<span class="quotes quote2">Transparent</span>
      				<span class="quotes quote3">Collaborative</span>
      				<span class="quotes quote4">True</span>
      			</h1>
      			<?php if( $headerintrotext ): ?>
      				<div class="header-intro-text"><?php echo $headerintrotext; ?></div>
      			<?php endif; ?>
      			<a href="#hometwo" class="chevron-down"><span class="fa fa-chevron-down"></span></a>
      			<div class="home-header-location-container">
      				<?php if( have_rows('home_header_location_repeater') ): ?>
      					<ul>
      	        	    <?php while( have_rows('home_header_location_repeater') ): the_row();

      		        	    // vars
      						$homeheaderlocation = get_sub_field('the_home_header_location');
      					?>
      						<li><?php echo $homeheaderlocation; ?></li>
      					<?php endwhile; ?>
      					</ul>
      				<?php endif; ?>
      			</div>
      		</div>
      	</header><!-- .entry-header -->
      </div>

      <?php while(have_rows('slider')) : the_row(); ?>
      <?php $thumb = get_sub_field('image'); ?>
      <div class="home-slide entry-header" style="background-image: url(<?php echo $thumb['url']; ?>);">
        <div class="entry-header-inner grid1060">
          <div class="home-slide__outer">
            <div class="home-slide__container">
              <h1 class="home-slide__heading entry-title headline-style-2">
                <?php the_sub_field('heading'); ?>
              </h1>
              <div class="home-slide__content header-intro-text">
                <?php the_sub_field('content') ?>
              </div>
              <?php
                $button = get_sub_field('button');
                if ( ! empty( $button ) ) :
              ?>
              <a href="<?php echo $button['url']; ?>" class="home-slide__button"><?php echo $button['title']; ?></a>
              <?php
                endif;
              ?>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>

    </div>
    <div class="home-slider-pager grid1060">
      <div class="home-slider-prev"></div>
      <div class="home-slider-dots"></div>
      <div class="home-slider-next"></div>
    </div>
  </div>



	<div class="entry-content">

		<div class="home-section-two">
			<a id="hometwo"></a>
			<?php
				//variables
				$hometwoheadline = get_field('home_section_two_headline');
				$hometwotext = get_field('home_section_two_text');
			?>
			<div class="home-section-two-inner grid1060">
				<?php if( $hometwoheadline ): ?>
					<h2 class="headline-style-6"><?php echo $hometwoheadline; ?></h2>
				<?php endif; ?>
				<?php if( $hometwotext ): ?>
					<div class="home-two-text"><?php echo $hometwotext; ?></div>
				<?php endif; ?>
			</div>

			<div class="home-two-three-buckets-container grid1120">
				<?php if( have_rows('home_section_two_bucket_repeater') ): ?>
	        	    <?php while( have_rows('home_section_two_bucket_repeater') ): the_row();

		        	    // vars
						$hometwobucketimage = get_sub_field('home_section_two_bucket_image');
						$hometwobucketheadline = get_sub_field('home_section_two_bucket_headline');
						$hometwobuckettext = get_sub_field('home_section_two_bucket_text');
					?>
					<div class="home-two-bucket-block">
						<?php if( !empty($hometwobucketimage) ): ?>
	                    	<div class="home-two-bucket-block-image-cont">
	                    		<img src="<?php echo $hometwobucketimage; ?>" alt="icon" />
	                    	</div>
	                    <?php endif; ?>
						<div class="home-two-bucket-text-container">

							<?php if( $hometwobucketheadline ): ?>
								<h4><?php echo $hometwobucketheadline; ?></h4>
							<?php endif; ?>
							<?php if( $hometwobuckettext ): ?>
								<p><?php echo $hometwobuckettext; ?></p>
							<?php endif; ?>
						</div>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>

		<?php
			//variables
			$homethreeheadline = get_field('home_section_three_headline');
			$homethreetext = get_field('home_section_three_text');
		?>
		<div class="home-section-three">

			<div class="home-section-three-inner grid1060">
				<?php if( $homethreeheadline ): ?>
					<h2 class="headline-style-6"><?php echo $homethreeheadline; ?></h2>
				<?php endif; ?>
				<?php if( $homethreetext ): ?>
					<div class="home-three-text"><?php echo $homethreetext; ?></div>
				<?php endif; ?>
			</div>

			<div class="client-overview-container">
				<div class="client-overview-arrow"></div>

			<?php
			$args = array (
				'post_type' => 'client',
				'order'  => 'DSC',
				'category_name' => 'client-on-home',
			);

			$clientquery = new WP_Query( $args );

			if( $clientquery->have_posts() ) : ?>
				<?php while( $clientquery->have_posts() ): $clientquery->the_post();

					//variables
					$clientarchiveimage = get_field('client_overview_image');
					$clientarchivelogo = get_field('client_overview_logo');
				?>

				<div class="the-archived-client-link">
					<div class="the-archived-client" <?php if( $clientarchiveimage ) : ?>style="background-image: url(<?php echo $clientarchiveimage; ?>);"<?php endif;?>>
						<?php if( $clientarchivelogo ) : ?>
							<div class="client-overview-logo"><img src="<?php echo $clientarchivelogo; ?>" alt="logo" /></div>
						<?php endif; ?>
					</div>
				</div>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

			</div>
		</div>

		<?php
			//variables
			$homefourimage = get_field('home_section_four_background_image');
			$homefourheadline = get_field('home_section_four_headline');
			$homefourtext = get_field('home_section_four_text');
			$homefoururl = get_field('home_section_four_button_link');
			$homefourbuttontext = get_field('home_section_four_button_text');
		?>
		<div class="home-section-four" <?php if( $homefourimage ) : ?>style="background-image: url(<?php echo $homefourimage; ?>);"<?php endif; ?>>
			<div class="home-section-four-inner grid1060">
				<?php if( $homefourheadline ) : ?>
					<h2 class="headline-style-5"><?php echo $homefourheadline; ?></h2>
				<?php endif; ?>
				<?php if( $homefourtext ) : ?>
					<div class="home-four-text"><?php echo $homefourtext; ?></div>
				<?php endif; ?>
				<?php if( $homefoururl ) : ?>
					<a href="<?php echo $homefoururl; ?>" class="red-button">
						<?php if( $homefourbuttontext ) : ?>
							<span><?php echo $homefourbuttontext; ?></span>
						<?php endif; ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
