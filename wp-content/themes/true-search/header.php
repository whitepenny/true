<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
<script src="https://use.typekit.net/mxg7gws.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93060366-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class('tk-aktiv-grotesk'); ?>>
<div id="page" class="site">
    <div class="reveal-bar search-reveal-bar closed" id="true-search-bar" style="display:none;">
        <div class="reveal-search">
            <div class="searchbar-container container">
  				<div class="row">
                    <div class="column full">

						<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-form navbar-right">
							<label for="s" class="assistive-text"><?php _e( 'Search', 'true-search' ); ?></label>
							<input type="text" class="field form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search the Site...', 'true-search' ); ?>" />
							<input type="submit" class="submit btn btn-default" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Go', 'true-search' ); ?>" />
						</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'true-search' ); ?></a>
	<div class="site-wrapper">
	<header id="masthead" class="site-header" role="banner">
        <div class="searchtop"><a class=""><i class="fa fa-search"></i> <span class="search-text">Search</span></a></div>
		<button id="showRight" class="menu-toggle main-nav__trigger" aria-controls="primary-menu" aria-expanded="false"><span class="hamburger-icon"></span></button>
		<div class="site-branding">
			<div class="site-branding-inner">
				<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="/wp-content/themes/true-search/svg/true-logo.svg" alt="true Search logo" class="black-logo" /><img src="/wp-content/themes/true-search/svg/true-logo-reverse.svg" alt="true Search logo" class="reverse-logo" /></a></div>
			</div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">