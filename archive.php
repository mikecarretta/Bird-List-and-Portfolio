<?php get_header(); ?>

<div class="row" id="main">
	
		<?php if ( have_posts() ) : ?>
		
		<!-- Page Title Header-->
		<div id="mainHeader" class="row"> 

			<div id="header">
				<h1>
					<?php if ( is_day() ) : ?>
						<?php printf( __( 'Daily Archives: <span>%s</span>', 'bird-portfolio' ), get_the_date() ); ?>
					<?php elseif ( is_month() ) : ?>
						<?php printf( __( 'Monthly Archives: <span>%s</span>', 'bird-portfolio' ), get_the_date(__( 'F Y', 'portfoliopress' )) ); ?>
					<?php elseif ( is_year() ) : ?>
						<?php printf( __( 'Yearly Archives: <span>%s</span>', 'bird-portfolio' ), get_the_date( 'Y' ) ); ?>
					<?php else : ?>
						<?php _e( 'Archives', 'bird-portfolio' ); ?>
					<?php endif; ?>
				</h1>
			</div><!-- END #header -->

		</div><!-- END #mainHeader .row -->
		
		<div class="nine columns" id="content">
		
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