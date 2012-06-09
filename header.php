<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />	
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Place apple-touch-icon-SIZE-precomposed.png in the root directory 57x57, 72x72 and-or 114x114 -->
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/apple-touch-icon-precomposed.png" />
	
	<title><?php
	/*
	* Print the <title> tag based on what is being viewed.
	*/
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', 'bird-portfolio' ), max( $paged, $page ) );

	?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />	
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="bodyBkg">
	
<div class="container" id="headerContainer">
<div class="row">	
	<header id="logoHeader">
			<?php 
			// The header logo uses the Options Fucntion Plugin developed by Devin Price http://www.wptheming.com/ 
			// If a custom logo is not uploaded, then the Text Title and Description will show.
			$heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
			
		<hgroup id="headerLogo">
				<<?php echo $heading_tag; ?> id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
	            <?php if ( of_get_option('logo', false) ) { ?>
					<img src="<?php echo of_get_option('logo'); ?>" alt="<?php echo bloginfo( 'name' ) ?>" />
				<?php } else {
					bloginfo( 'name' );
				}?>
	            </a>
	            </<?php echo $heading_tag; ?>>
				<?php if ( !of_get_option('logo', false) ) { ?>
	               <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
	            <?php } ?>
		</hgroup><!-- END #headerLogo -->		
	</header><!-- END #branding -->
			
	<div id="searchform-wrap">
			
			<?php get_search_form(); ?>
				
	</div><!-- END #searchform-wrap -->
</div><!-- END .row -->	

<div class="row">
			
	<div class="twelve columns">
				
		<nav id="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
		</nav><!-- END #navigation -->
								
	</div><!-- END .twelve columns -->	
	
</div><!-- END .row #nav -->
</div> <!-- END .container #headerContainer -->

<div class="container">