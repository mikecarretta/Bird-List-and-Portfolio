<?php
get_header(); ?>

	<div class="row" id="main">
	
	<?php the_post(); ?>
	
	<div id="mainHeader" class="row"> 

		<div id="header">
			<h1>
				<h2 class="page-title author"><?php printf( __( 'Author Archives: <span class="vcard">%s</span>', 'bird-portfolio' ), "<a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h2>
			</h1>
		</div><!-- END #header -->

	</div><!-- END #mainHeader .row -->

		<div class="nine columns" id="content">

			<?php rewind_posts(); ?>

			<?php get_template_part( 'content', 'author' ); ?>

		</div><!-- END .nine columns #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>