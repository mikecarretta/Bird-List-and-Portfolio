<?php get_header(); ?>

<div id="mainHeader" class="row"> 

	<div id="header">
		<h1><?php the_title(); ?></h1>
	</div>
	
</div>

<div class="row">
	<div class="nine columns" id="content">
			
		<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bird-portfolio' ), 'after' => '</div>' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'bird-portfolio' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-<?php the_ID(); ?> -->
        
        <?php if ( comments_open() ) {
        	comments_template( '', true );
		} ?>
		
		<?php endwhile; // end of the loop. ?>

		</div><!-- END 9 columns CONTENT -->
		
<?php get_sidebar(); ?>
<?php get_footer(); ?>