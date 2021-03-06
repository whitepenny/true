<?php
// New client groups
$client_groups = get_field( 'client_groups' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		//variables
		$largeheaderimage = get_field('large_header_background_image');
		$headerintrotext = get_field('header_intro_text');
	?>
	<header class="entry-header" <?php if( $largeheaderimage): ?>style="background-image: url(<?php echo $largeheaderimage; ?>);"<?php endif; ?>>
		<div class="entry-header-inner grid1120">

			<h1 class="entry-title headline-style-2"><?php the_title(); ?></h1>
			<?php if( $headerintrotext ): ?>
				<div class="header-intro-text reverse-header-intro-text"><?php echo $headerintrotext; ?></div>
			<?php endif; ?>

		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		  // NEW CLIENT TABS
		  if ( ! empty( $client_groups ) ) :
		    if ( count( $client_groups ) > 1 ) :

		    $label = get_field( 'client_groups_default_label' );
		    if ( empty( $label ) ) {
		      $label = 'All';
		    }

		?>
		<div class="sector-section-two sector-header-section client_group_header">
      
			<div class="client_group_buttons grid1120">
	      <?php
  	      /*
					$i = 0;
	        foreach ( $client_groups as $client_group ) :
	      ?>
	      <button type="button" class="client_group_button <?php if ( $i == 0 ) echo 'active'; ?>"><?php echo $client_group['group_title']; ?></button>
	      <?php
						$i++;
	        endforeach;
	        */
	      ?>
  	    <span class="client_group_label">View Clients:</span>
				<select class="client_group_select">
  				<!-- <option value=""><?php echo $label; ?></option> -->
					<?php
						$i = 0;
		        foreach ( $client_groups as $client_group ) :
		      ?>
		      <option value="<?php echo $i; ?>" <?php if ( $i == 0 ) echo 'selected="selected"'; ?>><?php echo $client_group['group_title']; ?></option>
		      <?php
							$i++;
		        endforeach;
		      ?>
				</select>
			</div>
			<?php
  			  endif;
			?>
		</div>
		<div class="sector-section-two sector-header-section client_group_header">
			<div class="client_groups">
	      <?php
					$i = 0;
	        foreach ( $client_groups as $client_group ) :
	      ?>
				<div class="client_group <?php if ( $i == 0 ) echo 'active'; ?>">
		      <div class="sector-client-container">
		        <?php
		          foreach ( $client_group['group_clients'] as $client_item ) :
		            $client = $client_item['the_client'];
		            $clientarchiveimage = get_field( 'client_overview_image', $client->ID );
		            $clientarchivelogo = get_field( 'client_overview_logo', $client->ID );
		        ?>
		        <div class="the-archived-client-link">
		          <div class="the-archived-client" <?php if( $clientarchiveimage ) : ?>style="background-image: url(<?php echo $clientarchiveimage; ?>);"<?php endif;?>>
		            <?php if( $clientarchivelogo ) : ?>
		              <div class="client-overview-logo"><img src="<?php echo $clientarchivelogo; ?>" alt="logo" /></div>
		            <?php endif; ?>
		          </div>
		        </div>
		        <?php
		          endforeach;
		        ?>
		      </div>
				</div>
	      <?php
						$i++;
	        endforeach;
	      ?>
			</div>
      <?php
        else:

        // OLD CLIENTS REPEATER
      ?>
			<div class="sector-client-container">

				<?php global $post; ?>
				<?php

				if( have_rows('client_repeater')): ?>
				    <?php while ( have_rows('client_repeater')) : the_row(); ?>

				    <?php // set up post object
				        $post_object = get_sub_field('the_client');
				        if( $post_object ) :
					        $post = $post_object;
					        setup_postdata($post);
				        ?>

					        <?php
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

					    	<?php wp_reset_postdata(); ?>

				    	<?php endif; ?>

				    <?php endwhile; ?>

				<?php endif; ?>

			</div>


		</div>

		<?php
		  endif;
		?>

		<div class="sector-section-three sector-header-section">
			<div class="entry-content-inner-sector grid1120">
				<?php
					//variables
					$sectorthreeheadline = get_field('sector_section_three_headline');
					$sectorthreetext = get_field('sector_section_three_text');
				?>
				<?php if( $sectorthreeheadline ): ?>
					<h2 class="sector-two-headline headline-style-6"><?php echo $sectorthreeheadline; ?></h2>
				<?php endif; ?>
				<div class="sector-two-text">
					<?php if( $sectorthreetext ): ?>
						<?php echo $sectorthreetext; ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="team-overview-grid">


				<?php global $post; ?>
				<?php

				if( have_rows('sector_team_repeater')): ?>
				    <?php while ( have_rows('sector_team_repeater')) : the_row(); ?>

				    <?php // set up post object
				        $post_object = get_sub_field('the_team_members');
				        if( $post_object ) :
					        $post = $post_object;
					        setup_postdata($post);
				        ?>

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

				    	<?php wp_reset_postdata(); ?>

				    	<?php endif; ?>

				    <?php endwhile; ?>

				<?php endif; ?>
				<!--End TEam-->

			</div>

			<div class="entry-content-inner-sector grid1120">
				<a href="/team/" class="red-button red-button-3">See The Full Team</a>
			</div>

		</div>




			<?php the_content(); ?>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
