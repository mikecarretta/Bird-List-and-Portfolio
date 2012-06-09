<?php

get_header(); ?>

<div class="row">

	<div class="nine columns" id="content">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php the_content(); ?>

		<div class="post-nav">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'bird-portfolio' ); ?></h1>
			<?php previous_post_link('<span class="prev">%link</span>', '<span class="arrow">&laquo;</span> %title') ?>				<?php next_post_link('<span class="next">%link</span>', '<span class="arrow">&raquo;</span> %title') ?>
		</div><!-- #post-nav -->

		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'bird-portfolio' ), '<span class="edit-link">', '</span>' ); ?>
		</footer>

	<?php if ( comments_open() ) {
		comments_template( '', true );
		} ?>

	<?php endwhile; // end of the loop. ?>

	</div><!-- END nine columns #content -->

<?php include (TEMPLATEPATH . '/sidebar-birds.php'); ?>

</div><!-- END .row #main -->

<?php get_footer(); ?>