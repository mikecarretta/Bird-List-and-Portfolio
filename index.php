<?php get_header(); ?>

<div id="mainHeader" class="row"> 

	<div id="header">
		<h1><?php wp_title("",true); ?></h1>
	</div>
	
</div>

<div class="row" id="main">
	
	<div class="nine columns" id="content">
	
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php bird_portfolio_content_nav(); ?>
			
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

	</div><!-- END .nine columns #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>