<?php

// Add new post type for home page feature post and image
add_action('init', 'news');
function news() 
{
	$feature_labels = array(
		'name' => _x('Feature News', 'post type general name'),
		'singular_name' => _x('Feature News', 'post type singular name'),
		'all_items' => __('Feature News'),
		'add_new' => _x('Add new feature news item', 'birds'),
		'add_new_item' => __('Add feature news item'),
		'edit_item' => __('Edit feature news item'),
		'new_item' => __('New sfeature news item'),
		'view_item' => __('View feature news item'),
		'search_items' => __('Search feature news items'),
		'not_found' =>  __('No feature items news found'),
		'not_found_in_trash' => __('No feature news items found in trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $feature_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports'	=>	array('title','editor','page-attributes','thumbnail','comments'),
		'has_archive' => 'news'
	); 
	register_post_type('news',$args);
}
/**
 * Add Bird count to "Right Now" Dashboard Widget
*/
function add_news_counts() {
        if ( ! post_type_exists( 'news' ) ) {
             return;
        }

        $num_posts = wp_count_posts( 'news' );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( 'News', 'News', intval($num_posts->publish) );
        if ( current_user_can( 'edit_posts' ) ) {
            $num = "<a href='edit.php?post_type=news'>$num</a>";
            $text = "<a href='edit.php?post_type=news'>$text</a>";
        }
        echo '<td class="first b b-news">' . $num . '</td>';
        echo '<td class="t news">' . $text . '</td>';
        echo '</tr>';

        if ($num_posts->pending > 0) {
            $num = number_format_i18n( $num_posts->pending );
            $text = _n( 'News Item Pending', 'News Items Pending', intval($num_posts->pending) );
            if ( current_user_can( 'edit_posts' ) ) {
                $num = "<a href='edit.php?post_status=pending&post_type=news'>$num</a>";
                $text = "<a href='edit.php?post_status=pending&post_type=news'>$text</a>";
            }
            echo '<td class="first b b-news">' . $num . '</td>';
            echo '<td class="t news">' . $text . '</td>';

            echo '</tr>';
        }
}
add_action( 'right_now_content_table_end', 'add_news_counts' );

function HomeFeatureItem() {
	$thumbnail = 'birds-slider';
	
	$args = array( 
		'post_type' => 'news',
		'posts_per_page' => 1,
		'orderby' => 'rand' );
	
	$loop = new WP_Query( $args );
	
		while ( $loop->have_posts() ) : $loop->the_post();		
		?>			
			<div class="row" id="featureNews">

				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'bird-portfolio' ); ?> <?php the_title_attribute(); ?>" class="thumb"><?php the_post_thumbnail( $thumbnail ); ?></a>
				
				<div>

					<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bird-portfolio' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a></h1>
								
				</div>	
					
			</div> 
				
<?php endwhile;	} ?>