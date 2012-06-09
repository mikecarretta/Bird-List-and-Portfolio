<?php

/**
 * Theme options require the "Options Framework" plugin to be installed in order to display.
 * If it's not installed, default settings will be used.
 */
 
if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
	
	$optionsframework_settings = get_option('optionsframework');
	
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
		
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}

if ( !function_exists( 'optionsframework_add_page' ) && current_user_can('edit_theme_options') ) {
	function birds_options_default() {
		add_theme_page(__('Theme Options','bird-portfolio'), __('Theme Options','bird-portfolio'), 'edit_theme_options', 'options-framework','optionsframework_page_notice');
	}
	add_action('admin_menu', 'birds_options_default');
}

/**
 * Displays a notice on the theme options page if the Options Framework plugin is not installed
 */

if ( !function_exists( 'optionsframework_page_notice' ) ) {
	function optionsframework_page_notice() { ?>
	
		<div class="wrap">
		<?php screen_icon( 'themes' ); ?>
		<h2><?php _e('Theme Options','portfoliopress'); ?></h2>
        <p><b><?php printf( __( 'If you would like to use the Portfolio Press theme options, please install the %s plugin.', 'bird-portfolio' ), '<a href="http://wordpress.org/extend/plugins/options-framework/">Options Framework</a>' ); ?></b></p>
        <p><?php _e('Once the plugin is activated you will have option to:','bird-portfolio'); ?></p>
        <ul class="ul-disc">
        <li><?php _e('Upload a logo image','bird-portfolio'); ?></li>
        <li><?php _e('Change the sidebar position','bird-portfolio'); ?></li>
        <li><?php _e('Change the menu position','bird-portfolio'); ?></li>
        <li><?php _e('Hide the portfolio image on the single post','bird-portfolio'); ?></li>
        <li><?php _e('Update the footer text','bird-portfolio'); ?></li>
        </ul>
        
        <p><?php _e('If you don\'t need these options, the plugin is not required and default settings will be used.','bird-portfolio'); ?></p>
		</div>
	<?php
	}
}

/**
 * Favicon Option
 */

function birds_favicon() {
	$favicon = of_get_option('custom_favicon', false);
	if ( $favicon ) {
        echo '<link rel="shortcut icon" href="'.  $favicon  .'"/>'."\n";
    }
}

add_action('wp_head', 'birds_favicon');

/**
 * Body and Header Style
 */

function birds_head_css() {
	$background = of_get_option('header_background');
	  if ($background) {
	    if ($background['image']) {
	    echo '<style type="text/css">
		#headerContainer { background:url('.$background['image'].') '.' '. $background['color'] .' '. $background['repeat'] .' '. $background['position'] .' '. $background['attachment'] .';}</style>';
		} else {
	    echo '<style type="text/css">
		#headerContainer { background:'.$background['color'].'; } </style>';
	    }
	}

	$background = of_get_option('body_background');
	  if ($background) {
	    if ($background['image']) {
	    echo '<style type="text/css">
		#bodyBkg { background:url('.$background['image'].') '.' '. $background['color'] .' '. $background['repeat'] .' '. $background['position'] .' '. $background['attachment'] .';}</style>';
		} else {
	    echo '<style type="text/css">
		#bodyBkg { background:'.$background['color'].'; } </style>';
	    }
	}
}
add_action('wp_head', 'birds_head_css');
?>