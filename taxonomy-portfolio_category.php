<?php get_header(); 
$thumbnail = 'birds-thumbnail-portfolio';
?>

<!-- Page Title Header-->
<div id="mainHeader" class="row"> 

	<div id="header">
		<h1><?php wp_title("",true); ?></h1>
	</div>
	
</div>

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

<?php get_footer(); ?>