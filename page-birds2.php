<?php

/* Template Name: Birds List - Thumbnail and Title Only */

get_header(); ?>

<!-- Page Title and Bird Post Count Header-->
	<div id="mainHeader" class="row"> 
		<div id="header">

			<div class="six columns">
				<h1><?php wp_title("",true); ?></h1>
			</div>

			<div class="six columns">
				<h2 id="birdCount">	
					<span id="birdCountBox">
						<?php
						$published_posts = wp_count_posts( 'birds' )->publish;
						echo ($published_posts);
						?>
					</span>
					<span id="birdCountText"> Total Birds: </span>
				</h2>
			</div>

		</div><!-- END #header .row-->
	</div><!-- END #mainHeader .row-->
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

		$args = array( 'post_type' => 'birds',
			'posts_per_page' => 20,
			'orderby' => 'name',
			'order' => 'ASC',
			'paged' => $paged );
		query_posts( $args );
	}
?>
<div class="row">
		
		<?php  if ( have_posts() ) : $count = 0; while ( have_posts() ) : the_post(); $count++; global $post; ?>

		<div class="birdListView2">
			
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'bird-portfolio' ); ?> <?php the_title_attribute(); ?>" class="thumb"><?php the_post_thumbnail( $thumbnail ); ?></a>
			<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bird-portfolio' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			
		</div><!-- END .birdListView2 -->

		<?php endwhile; ?>

		<?php else: ?>

			<h2 class="title"><?php _e( 'Sorry, no posts matched your criteria.', 'bird-portfolio' ) ?></h2>

		<?php endif; ?>

</div><!-- END .row -->

<div id="birdListPageNav" class="row"> 

	<?php bird_portfolio_content_nav();/* Display navigation to next/previous pages when applicable */ ?>

</div><!-- END .row #birdListPageNav -->

<?php get_footer(); ?>