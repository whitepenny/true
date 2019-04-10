<?php
	
	/**
	 * Plugin Name:  Black Bar by eCity
	 * Description:  This plugin creates a black bar on top of the website showing a menu of sites usign images as buttons. This plugin use CMB2 plugin for the administration panel.
	 * Version:      1.0beta
	 * License:      GPL3
	 * License URI:  https://www.gnu.org/licenses/gpl-3.0.en.html
	 */
	
	const BB_DOMAIN_NAME = 'blackbar'; // Used for domain parameter and cmb2 prefix options	
	const BB_OPTIONS = BB_DOMAIN_NAME . '_options'; // Used for blackBar options
	define( 'BB_URL', plugin_dir_url( __FILE__ ) );
	$current_site = $_SERVER['HTTP_HOST'];
	
	
	/**
	 * Check if the cmb2_init.php file exists. If not send a error message because this file 
	 * is require
	 */
	if ( !file_exists( __DIR__ . '/cmb2_init.php' ) )
		wp_die(__('Your plugin installation have some troubles. It\'s missing the <e>cmb2_init</e> file.'), BB_DOMAIN_NAME );
	
	require( 'cmb2_init.php' );
	
	
	/**
	 * Enqueue javascript files and styles files related to Black Bar
	 */
	add_action( 'wp_enqueue_scripts','bb_enqueue_assets' );
	function bb_enqueue_assets(){
		
		wp_enqueue_style(
			'bb_styles',
			BB_URL . 'css/bb-styles.min.css'
		);
		
	}
	
	
	/**
	 * Create a BlackBar after the current theme loads
	 */
	//add_action( 'after_setup_theme', 'bb_load_top_blackbar' );
	add_action('wp_head', 'bb_load_top_blackbar');
	function bb_load_top_blackbar(){

		global $bb_general_settings, $current_site, $pagenow;
		
		if ( !is_admin() && $pagenow !== 'wp-login.php' && $pagenow !== 'xmlrpc.php' ):
			
			$top_options  = get_option( BB_OPTIONS . '_top' );
			
			if ( $top_options[$bb_general_settings][0][$bb_general_settings . '_is_active'] === 'on' ) bb_top_bar( $top_options );
		
		endif;
		
	}
	
	function bb_top_bar( $options ){
		
		global $bb_general_settings, $bb_sites, $current_site;
		
		$general_settings = ( is_array( $options[$bb_general_settings][0] ) )
			? $options[$bb_general_settings][0]
			: array(
				$bb_general_settings . '_background_color' => '#000000'
			);
		
		$sites = ( is_array( $options[$bb_sites] ) )
			? $options[$bb_sites]
			: '';
		
		$extra_top = ( is_admin_bar_showing() )
			? 'top: 32px;'
			: 'top: 0;';
		
		$bb_bg = ( $general_settings[$bb_general_settings . '_background_color'] !== '' )
			? 'background-color: ' . $general_settings[$bb_general_settings . '_background_color'] .';'
			: 'background-color: #000000';
		
		$bb_styles = ( $general_settings[$bb_general_settings . '_is_sticky'] === 'on' )
			? 'position: fixed; ' . $extra_top . $bb_bg
			: 'position: relative;';
		
		
		if ( count( $sites ) > 0 )
			require_once( 'templates/blackbar_top.php' );
		
		
	}
	
	
	/**
	 * Create a BlackBar before wp_footer hook
	 */
	add_action( 'wp_footer', 'bb_load_bottom_blackbar' );
	function bb_load_bottom_blackbar(){
		
		global $bb_general_settings, $current_site, $pagenow;
		
		if ( !is_admin() && $pagenow !== 'wp-login.php' && $pagenow !== 'xmlrpc.php' ):
			
			$bottom_options  = get_option( BB_OPTIONS . '_bottom' );
			
			if ( $bottom_options[$bb_general_settings][0][$bb_general_settings . '_is_active'] === 'on' ) bb_bottom_bar( $bottom_options );
		
		endif;
		
	}
	
	function bb_bottom_bar( $options ){
		
		global $bb_general_settings, $bb_sites, $current_site;
		
		$general_settings = ( is_array( $options[$bb_general_settings][0] ) )
			? $options[$bb_general_settings][0]
			: array(
				$bb_general_settings . '_background_color' => '#000000'
			);
		
		$sites = ( is_array( $options[$bb_sites] ) )
			? $options[$bb_sites]
			: '';
		
		$extra_top = ( is_admin_bar_showing() )
			? 'top: 32px;'
			: 'top: 0;';
		
		$bb_bg = ( $general_settings[$bb_general_settings . '_background_color'] !== '' )
			? 'background-color: ' . $general_settings[$bb_general_settings . '_background_color'] .';'
			: 'background-color: #000000';
		
		$bb_styles = 'position: relative;' . $bb_bg;
		
		
		if ( count( $sites ) > 0 )
			require_once( 'templates/blackbar_bottom.php' );
		
		
	}