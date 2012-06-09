<?php	
function birds_theme_enqueue_scripts() {	
	//Superfish drop down menu
	wp_enqueue_script( 'superfish', get_template_directory_uri() .'/js/superfish.js', array( 'jquery' ));
}
add_action('wp_enqueue_scripts', 'birds_theme_enqueue_scripts');

	// Bird List Post Type Functions
	require_once( TEMPLATEPATH . '/extensions/bird-post-type.php' );	
	// Portfolio Post Type Functions
	require_once( TEMPLATEPATH . '/extensions/birdPortfolio-post-type.php' );		
	// Sets up the options panel and default functions
	require_once( TEMPLATEPATH . '/extensions/options-functions.php' );
	// Sets up the options panel and default functions
	require_once( TEMPLATEPATH . '/extensions/custom-widgets.php' );
	// Sets up the home page image slider - Orbit by Zurb - Foundation Framework
	require_once( TEMPLATEPATH . '/extensions/featureItem-post-type.php' );

	// Textdomain for localization support with language files in the /languages folder. Only the PO file is included; there are no translations yet.
	load_theme_textdomain( 'bird-portfolio', TEMPLATEPATH . '/languages' );
	
	// This is the default content width, 640 px
	if ( ! isset( $content_width ) )
		$content_width = 640;
	
	// Add support for a variety of post formats 	
	add_theme_support( 'post-formats', array( 'gallery', 'quote', 'image' ) );
	
	// Adding theme support for post thumbnails
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'birds-thumbnail-small', 50, 50, true );
	add_image_size( 'birds-thumbnail', 150, 150, true );
	add_image_size( 'birds-thumbnail-portfolio', 240, 240, true );
	add_image_size( 'birds-slider', 980, 280, true );
	add_image_size( 'birds-large', 630, 9999, false );
	
	// Telling WordPress to use editor-style.css for the visual editor
	add_editor_style();
	// Adding feed links to header
	add_theme_support( 'automatic-feed-links' );
	
	// Excerpt Function for the birds custom post page
	// Excerpt Snippet - http://net.tutsplus.com/tutorials/wordpress/create-a-multi-layout-portfolio-with-wordpress/
	// Adding Variable Excerpt Length
	function folio_excerpt_length($length) {
	    return 20;
	}
	function folio_excerpt_more($more) {
		return ' ... <span class="excerpt_more"><a href="'.get_permalink().'">Read more</a></span>';
	}
	function folio_excerpt($length_callback='', $more_callback='') {
	    global $post;
	    if(function_exists($length_callback)){
	        add_filter('excerpt_length', $length_callback);
	    }
	    if(function_exists($more_callback)){
	        add_filter('excerpt_more', $more_callback);
	    }
	    $output = get_the_excerpt();
	    $output = apply_filters('wptexturize', $output);
	    $output = apply_filters('convert_chars', $output);
	    $output = '<p>'.$output.'</p>';
	    echo $output;
	}
	// This theme uses wp_nav_menu() in one location
	// Menu Function from Portfolio Press theme: http://wptheming.com/portfolio-theme/
	register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'bird-portfolio' ),
		) );
	//Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
	function birds_page_menu_args( $args ) {
		$args['show_home'] = true;
		$args['menu_class'] = 'menu';
		return $args;
	}
	add_filter( 'wp_page_menu_args', 'birds_page_menu_args' );
	//Class name for wp_nav_menu
	function portfolio_wp_nav_menu_args( $args ) {
		$args['container_class'] = 'menu';
		$args['menu_class'] = '';
		return $args;
	}
	// Sets up the widget areas
	// Custom widgets are in the extensions folder: custom-widgets.php
	function birds_widgets_init() {
		register_sidebar( array (
			'name' => __( 'Sidebar', 'bird-portfolio' ),
			'id' => 'sidebar',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => "</li>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array (
			'name' => __( 'Home Page Column 1', 'bird-portfolio' ),
			'id' => 'homepage-1',
			'description' => __( "Widetized home page - Column 1", 'bird-portfolio' ),
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		register_sidebar( array (
			'name' => __( 'Home Page Column 2', 'bird-portfolio' ),
			'id' => 'homepage-2',
			'description' => __( "Widetized home page - Column 2", 'bird-portfolio' ),
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		register_sidebar( array (
			'name' => __( 'Bird Image Detail Sidebar', 'bird-portfolio' ),
			'id' => 'single-bird-detail',
			'description' => __( "Widetized sidebar for the birds detail view", 'bird-portfolio' ),
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		register_sidebar( array (
			'name' => __( 'Portfolio Image Detail Sidebar', 'bird-portfolio' ),
			'id' => 'portfolio-bird-detail',
			'description' => __( "Widetized sidebar for the portfolio image detail view", 'bird-portfolio' ),
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		register_sidebar( array ( 
			'name' => __( 'Footer 1', 'bird-portfolio' ),
			'id' => 'footer-1', 
			'description' => __( "Widetized footer", 'bird-portfolio' ), 
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>' 
			) );
		register_sidebar( array ( 
			'name' => __( 'Footer 2', 'bird-portfolio' ),
			'id' => 'footer-2', 
			'description' => __( "Widetized footer", 'bird-portfolio' ), 
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</div>','before_title' => '<h3>',
			'after_title' => '</h3>' 
			) );
		register_sidebar( array ( 
			'name' => __( 'Footer 3', 'bird-portfolio' ),
			'id' => 'footer-3', 
			'description' => __( "Widetized footer", 'bird-portfolio' ), 
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>' 
			) );
		
	    }
	add_action( 'init', 'birds_widgets_init' );

/**
 * Function from Portfolio Press theme: http://wptheming.com/portfolio-theme/
 * Sets posts displayed per birds list page to xx.
 * If you change this you should also update the query $args in
 * page-birds.php and related taxonomy templates.
 */
function wpt_birds_custom_posts_per_page( &$q ) {
	if ( get_post_type() == 'birds' )
		$q->set( 'posts_per_page', 12 );
	return $q;
}

add_filter( 'parse_query', 'wpt_birds_custom_posts_per_page' );

/**
 * Reusable navigation code for navigation
 * Display navigation to next/previous pages when applicable
 */
function bird_portfolio_content_nav() {
	global $wp_query;
	if (  $wp_query->max_num_pages > 1 ) :
		if (function_exists('wp_pagenavi') ) {
			wp_pagenavi();
		} else { ?>
			<nav id="nav-below">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'birds-portfolio' ); ?></h1>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'birds-portfolio' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'birds-portfolio' ) ); ?></div>
			</nav><!-- #nav-below -->
    	<?php }
	endif;
}

/**
 * http://alex.leonard.ie/2012/01/23/wordpress-get-featured-image-exif-data/
 * Create a definition list containing EXIF data of featured image (if exists)
 */
function pa_the_post_thumbnail_exif_data($postID = NULL) {
    // if $postID not specified, then get global post and assign ID
    if (!$postID) {
        global $post;
        $postID = $post->ID;
    }
    if (has_post_thumbnail($postID)) {
        // get the meta data from the featured image
        $postThumbnailID = get_post_thumbnail_id( $postID );
        $photoMeta = wp_get_attachment_metadata( $postThumbnailID );
        // if the shutter speed is not equal to 0
        if ($photoMeta['image_meta']['shutter_speed'] != 0) {
            // Convert the shutter speed to a fraction
            if ((1 / $photoMeta['image_meta']['shutter_speed']) > 1) {
                if ((number_format((1 / $photoMeta['image_meta']['shutter_speed']), 1)) == 1.3
                or number_format((1 / $photoMeta['image_meta']['shutter_speed']), 1) == 1.5
                or number_format((1 / $photoMeta['image_meta']['shutter_speed']), 1) == 1.6
                or number_format((1 / $photoMeta['image_meta']['shutter_speed']), 1) == 2.5) {
                    $photoShutterSpeed = "1/" . number_format((1 / $photoMeta['image_meta']['shutter_speed']), 1, '.', '') . " second";
                } else {
                    $photoShutterSpeed = "1/" . number_format((1 / $photoMeta['image_meta']['shutter_speed']), 0, '.', '') . " second";
                }
            } else {
                $photoShutterSpeed = $photoMeta['image_meta']['shutter_speed'] . " seconds";
            }
            // print our definition list
        ?>
            <dl id="exifPortfolio">    
                <dd>Date Taken: <?php echo date("d M Y, H:i:s", $photoMeta['image_meta']['created_timestamp']); ?></dd>
                <dd>Camera: <?php echo $photoMeta['image_meta']['camera']; ?></dd>
                <dd>Focal Length: <?php echo $photoMeta['image_meta']['focal_length']; ?>mm</dd>
                <dd>Aperture: f/<?php echo $photoMeta['image_meta']['aperture']; ?></dd>
                <dd>ISO: <?php echo $photoMeta['image_meta']['iso']; ?></dd>
                <dd>Shutter Speed: <?php echo $photoShutterSpeed; ?></dd>
            </dl>
        <?php
        // if shutter speed exif is 0 then echo error message
        } else {
            echo '<p>EXIF data not found</p>';
        }
    // if no featured image, echo error message
    } else {
        echo '<p>Featured image not found</p>';
    }
}
?>