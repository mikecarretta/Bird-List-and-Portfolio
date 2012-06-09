<?php get_header(); ?>

		<div class="row">

			<?php while ( have_posts() ) : the_post(); ?>

					<!-- Page Title Header-->
					<div id="mainHeader" class="row"> 

						<div id="header">
						<h1><?php the_title(); ?></h1>
						
						</div><!-- END #header -->

					</div><!-- END #mainHeader .row -->

			<div class="twelve columns" id="content">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
					
						<?php the_content(); ?>

					</div><!-- .entry-content -->

				</article><!-- #post-<?php the_ID(); ?> -->

				<nav class="post-nav">
					<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'bird-portfolio' ); ?></h1>
					<?php previous_post_link('<span class="prev">%link</span>', '<span class="arrow">&laquo;</span> %title') ?>				<?php next_post_link('<span class="next">%link</span>', '<span class="arrow">&raquo;</span> %title') ?>
				</nav><!-- #post-nav -->

				<?php if ( comments_open() ) {
					comments_template( '', true );
                } ?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- END .twelve columns #content -->

<?php get_footer(); ?>