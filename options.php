<?php

function optionsframework_option_name() {
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = 'portfoliopress';
	update_option('optionsframework', $optionsframework_settings);
	
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('template_url') . '/images/';
	
	// Options array	
	$options = array();
		
	$options[] = array( "name" => __('General Settings','bird-portfolio'),
                    	"type" => "heading");
						
	$options[] = array( "name" => __('Custom Logo','bird-portfolio'),
						"desc" => __('Upload a logo for your theme if you would like to use one.','portfoliopress'),
						"id" => "logo",
						"type" => "upload");
						
	$options[] = array( "name" => __('Custom Favicon','bird-portfolio'),
						"desc" => __('Upload a 16px x 16px Png/Gif image to represent your website.','portfoliopress'),
						"id" => "custom_favicon",
						"type" => "upload");                                       
	
	$options[] = array( 'name' =>  __('Header Background', 'bird-portfolio'),
						'desc' => __('Change the header background color and/or upload a background texture.', 'bird-portfolio'),
						'id' => 'header_background',
						'std' => $background_defaults,
						'type' => 'background' );
						
	$options[] = array( 'name' =>  __('Body Background', 'bird-portfolio'),
						'desc' => __('Change the body background color and/or upload a background texture.', 'bird-portfolio'),
						'id' => 'body_background',
						'std' => $background_defaults,
						'type' => 'background' );
										
	$options[] = array( "name" => __('Footer Settings','bird-portfolio'),
						"type" => "heading");  
	
	$options[] = array( "name" => __('Custom Footer Text','bird-portfolio'),
						"desc" => __('Custom text that will appear in the footer of your theme.','portfoliopress'),
						"id" => "footer_text",
						"type" => "textarea");
									
	return $options;
}