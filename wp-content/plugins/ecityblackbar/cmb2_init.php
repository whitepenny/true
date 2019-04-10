<?php
	
	/**
	 * Initialize CMB2 plugin to get its options. Getting the Bootstrap.
	 */
	
	if ( file_exists( __DIR__ . '/cmb2/init.php' ) ) {
		require_once __DIR__ . '/cmb2/init.php';
	} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
		require_once __DIR__ . '/CMB2/init.php';
	}
	
	
	/**
	 * Start with an underscore to hide fields from custom fields list
	 */
	$bb_prefix = BB_DOMAIN_NAME . '_';
	$bb_general_settings = $bb_prefix . '_general_settings';
	$bb_sites =  $bb_prefix . '_sites';
	
	/**
	 * Create a option page to administrate all given options
	 * through the dashboard.
	 */
	add_action( 'cmb2_admin_init', 'bb_options_page' );
	function bb_options_page() {
		
		global $bb_general_settings, $bb_sites;
		
		$bb_settings_group = array(
			'id'          => $bb_general_settings,
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'   => __( 'General Settings', BB_DOMAIN_NAME ),
				'sortable'      => true,
				'closed'        => false,
			),
			'before_group' => '<h2>' . __( 'Bar Settings' ) . '</h2>'
		);
		
		$bb_is_active_field = array(
			'id'        => $bb_general_settings . '_is_active',
			'name'      => __( 'Active Top Bar', BB_DOMAIN_NAME ),
			'desc'      => __( 'Activate the Top Bar on header.', BB_DOMAIN_NAME ),
			'type'      => 'checkbox'
		);
		
		$bb_sticky_field = array(
			'id'        => $bb_general_settings . '_is_sticky',
			'name'      => __( 'Fixed bar', BB_DOMAIN_NAME ),
			'desc'      => __( 'This field makes sticky the Top Bar on header.', BB_DOMAIN_NAME ),
			'type'      => 'checkbox'
		);
		
		$bb_background_field = array(
			'id'        => $bb_general_settings . '_background_color',
			'name'      => __( 'Background Color', BB_DOMAIN_NAME ),
			'desc'      => __( 'This is the background color for the bar.', BB_DOMAIN_NAME ),
			'type'      => 'colorpicker',
			'default'   => '#000000'
		);
		
		$bb_sites_group = array(
			'id'          => $bb_sites,
			'type'        => 'group',
			'repeatable'  => true,
			'options'     => array(
				'group_title'   => __( 'Site to Linkage', BB_DOMAIN_NAME ),
				'sortable'      => true,
				'closed'        => false,
			),
			'before_group' => '<h2>' . __( 'Bar Sites' ) . '</h2>'
		);
		
		$bb_link_field = array(
			'id'        => $bb_sites . '_link',
			'name'      => __( 'Link to the page', BB_DOMAIN_NAME ),
			'desc'      => __( 'This field is the link to the site.', BB_DOMAIN_NAME ),
			'type'      => 'text_url',
			'protocols' => array( 'http', 'https' )
		);
		
		$bb_icon_field = array(
			'id'        => $bb_sites . '_icon',
			'name'      => __( 'Icon', BB_DOMAIN_NAME ),
			'desc'      => __( 'This icon will be showing in the bar as a link.', BB_DOMAIN_NAME ),
			'type'      => 'file',
			'preview_size' => 'thumbnail',
			'text'    => array(
				'add_upload_file_text' => __( 'Add Image', BB_DOMAIN_NAME )
			),
			'options' => array(
				'url' => false,
			)
		);
		
		$bb_text_field = array(
			'id'        => $bb_sites . '_text',
			'name'      => __( 'Text (for mobile version)', BB_DOMAIN_NAME ),
			'desc'      => __( 'This text will be showing in lower resolutions.', BB_DOMAIN_NAME ),
			'type'      => 'text_medium'
		);
		
		# TOP BAR
		################################################################
		
		/**
		 * Arguments for the creation of the Top BlackBar Option Page in
		 * the dashboard
		 */
		$bb_top_page_options = array(
			'id'            => BB_OPTIONS . '_top',
			'title'         => esc_html__( 'Top Bar Options', BB_DOMAIN_NAME ),
			'object_types'  => array( 'options-page' ),
			'option_key'    => BB_OPTIONS . '_top',
			'icon_url'      => 'dashicons-screenoptions',
			'menu_title'    => esc_html__( 'Top Bar Options', BB_DOMAIN_NAME ),
			'capability'    => 'manage_options',
			'position'      => 4,
			'save_button'   => esc_html__( 'Save Top Options', BB_DOMAIN_NAME ),
		);
		
		/**
		 * Registers Top Bar options page menu item and form.
		 */
		$top_options = new_cmb2_box( $bb_top_page_options );
		
		/**
		 * Create a General Settings Group
		 */
		$bb_general_settings_group = $top_options->add_field( $bb_settings_group );
		
		/**
		 * Create a Is Active checkbox Field
		 */
		$top_options->add_group_field( $bb_general_settings_group, $bb_is_active_field );
		
		/**
		 * Create a Sticky checkbox Field
		 */
		$top_options->add_group_field( $bb_general_settings_group, $bb_sticky_field );
		
		/**
		 * Create a Background Color Field
		 */
		$top_options->add_group_field( $bb_general_settings_group, $bb_background_field );
		
		/**
		 * Create a Sites Settings Group
		 */
		$bb_sites_linkages_group = $top_options->add_field( $bb_sites_group );
		
		/**
		 * Create a Link to the site Field
		 */
		$top_options->add_group_field( $bb_sites_linkages_group, $bb_link_field );
		
		/**
		 * Create a Icon for the site Field
		 */
		$top_options->add_group_field( $bb_sites_linkages_group, $bb_icon_field );
		
		
		# BOTTOM BAR
		################################################################
		
		/**
		 * Arguments for the creation of the Bottom BlackBar Option Page in
		 * the dashboard
		 */
		$bb_bottom_page_options = array(
			'id'            => BB_OPTIONS . '_bottom',
			'title'         => esc_html__( 'Bottom Bar Options', BB_DOMAIN_NAME ),
			'object_types'  => array( 'options-page' ),
			'option_key'    => BB_OPTIONS . '_bottom',
			'icon_url'      => 'dashicons-screenoptions',
			'menu_title'    => esc_html__( 'Bottom Bar Options', BB_DOMAIN_NAME ),
			'capability'    => 'manage_options',
			'parent_slug'   => BB_OPTIONS . '_top',
			//'position'    => 4,
			'save_button'   => esc_html__( 'Save Bottom Options', BB_DOMAIN_NAME ),
		);
		
		/**
		 * Registers Top Bar options page menu item and form.
		 */
		$bottom_options = new_cmb2_box( $bb_bottom_page_options );
		
		/**
		 * Create a General Settings Group
		 */
		$bb_general_settings_group = $bottom_options->add_field( $bb_settings_group );
		
		/**
		 * Create a Is Active checkbox Field
		 */
		$bottom_options->add_group_field( $bb_general_settings_group, $bb_is_active_field );
		
		/**
		 * Create a Sticky checkbox Field
		 */
		//$bottom_options->add_group_field( $bb_general_settings_group, $bb_sticky_field );
		
		/**
		 * Create a Background Color Field
		 */
		$bottom_options->add_group_field( $bb_general_settings_group, $bb_background_field );
		
		/**
		 * Create a Sites Settings Group
		 */
		$bb_sites_linkages_group = $bottom_options->add_field( $bb_sites_group );
		
		/**
		 * Create a Link to the site Field
		 */
		$bottom_options->add_group_field( $bb_sites_linkages_group, $bb_link_field );
		
		/**
		 * Create a text for the site Field
		 */
		$bottom_options->add_group_field( $bb_sites_linkages_group, $bb_text_field );
		
		/**
		 * Create a Icon for the site Field
		 */
		$bottom_options->add_group_field( $bb_sites_linkages_group, $bb_icon_field );
		
	}