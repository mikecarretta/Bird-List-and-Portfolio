<?php get_header(); ?>

<div class="row">

	<div class="nine columns" id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			
			<div class="entry">
				
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				
			</div>
			
		</div>
		
		<div class="post-nav">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'bird-portfolio' ); ?></h1>
			<?php previous_post_link('<span class="prev">%link</span>', '<span class="arrow">&laquo;</span> %title') ?>				<?php next_post_link('<span class="next">%link</span>', '<span class="arrow">&raquo;</span> %title') ?>
		</div><!-- #post-nav -->

		<?php if ( comments_open() ) {
			comments_template( '', true );
        } ?>

	<?php endwhile; endif; ?>

	</div><!-- END nine columns CONTENT -->

<?php include (TEMPLATEPATH . '/sidebar-portfolio.php'); ?>
	
</div><!-- END .row -->

<?php get_footer(); ?>