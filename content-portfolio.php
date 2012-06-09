<?
// Modify the query if a page or archive calls this template
// Query from Portfolio Press theme: http://wptheming.com/portfolio-theme/

$thumbnail = 'birds-thumbnail-portfolio';

if ( !is_tax() ) {
	// WP 3.0 PAGED BUG FIX
	if ( get_query_var( 'paged' ) )
		$paged = get_query_var( 'paged' );
	elseif ( get_query_var( 'page' ) )
		$paged = get_query_var( 'page' );
	else
		$paged = 1;
	
	$args = array( 'post_type' => 'portfolio',
		'posts_per_page' => 12,
		'orderby' => 'date',
		'order' => 'DESC',
		'paged' => $paged );
	query_posts( $args );
}

?>

<div class="row"> 
	
	<div id="portfolio">
		
		<?php  if ( have_posts() ) : $count = 0; while ( have_posts() ) : the_post(); $count++; global $post; ?>

		<div class="portfolioItem">
			
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'bird-portfolio' ); ?> <?php the_title_attribute(); ?>" class="thumb"><?php the_post_thumbnail( $thumbnail ); ?></a>
		
		</div><!-- END .portfolioItem -->

		<?php endwhile; ?>

		<?php else: ?>

			<h2 class="title"><?php _e( 'Sorry, no posts matched your criteria.', 'bird-portfolio' ) ?></h2>

		<?php endif; ?>
		
	</div><!-- END #portfolio -->
	
</div><!-- END .row -->

<div id="birdListPageNav" class="row"> 

	<?php bird_portfolio_content_nav();/* Display navigation to next/previous pages when applicable */ ?>

</div><!-- END .row #birdListPageNav -->
<?php wp_reset_query(); ?>