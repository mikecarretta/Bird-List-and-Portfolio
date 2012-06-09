<?php get_header();

$thumbnail = 'birds-thumbnail';

if ( !is_tax() ) {
	// WP 3.0 PAGED BUG FIX
	if ( get_query_var( 'paged' ) )
		$paged = get_query_var( 'paged' );
	elseif ( get_query_var( 'page' ) )
		$paged = get_query_var( 'page' );
	else
		$paged = 1;
	
	$args = array( 'taxonomy' => 'bird-tags',
		'posts_per_page' => 12,
		'orderby' => 'name',
		'order' => 'ASC',
		'paged' => $paged );
	query_posts( $args );
}
?>
	<!-- Page Title Header-->
	<div id="mainHeader" class="row"> 

		<div id="header">

			<h1><?php printf( __(single_cat_title( '', false )));?></h1>

		</div><!-- END #header -->

	</div><!-- END #mainHeader .row -->

	<div id="birdList" class="row"> 

	<?php  if ( have_posts() ) : $count = 0;
		while ( have_posts() ) : the_post(); $count++; global $post; ?>

		<div id="birdListCols">

		<div id="birdListThumb">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'bird-portfolio' ); ?> <?php the_title_attribute(); ?>" class="thumb"><?php the_post_thumbnail( $thumbnail ); ?></a>
		</div><!-- END #birdListThumb-->

		<h1 id="birdListTitle">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bird-portfolio' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
		<?php the_title(); ?>
		</a>
		</h1>

		<div id="birdListMeta">
			<?php if (get_the_term_list( $post->ID, 'bird-order' ) != null ) { ?>
				<div><span id="birdListMetaName">Order:</span> <?php echo get_the_term_list( $post->ID, 'bird-order', '', ', ', '' ); ?></div>
			<?php } ?>
			<?php if (get_the_term_list( $post->ID, 'bird-family' ) != null ) { ?>
				<div><span id="birdListMetaName">Family:</span> <?php echo get_the_term_list( $post->ID, 'bird-family', '', ', ', '' ); ?></div>
			<?php } ?>
			<?php if (get_the_term_list( $post->ID, 'bird-tags' ) != null ) { ?>
				<div><span id="birdListMetaName">Tags:</span> <?php echo get_the_term_list( $post->ID, 'bird-tags', '', ', ', '' ); ?></div>
			<?php } ?>
		</div><!-- END #birdListMeta -->

		<div id="birdListExcerpt">
		<!-- Using custom excerpt function to fetch the excerpt -->
		<?php folio_excerpt('folio_excerpt_length','folio_excerpt_more'); ?>
		</div>

		</div><!-- END #birdListCols -->

	<?php endwhile; ?>

	<?php else: ?>

		<h2 class="title"><?php _e( 'Sorry, no posts matched your criteria.', 'bird-portfolio' ) ?></h2>

	<?php endif; ?>

	</div><!-- END .row -->

	<div id="birdListPageNav" class="row"> 

	<?php /* Display navigation to next/previous pages when applicable */ ?>

	<?php if (  $wp_query->post_count > 12 || $wp_query->max_num_pages > 1 || is_paged() ) : ?>

	<?php if ( function_exists( 'wp_pagenavi' ) ) { ?>

		<?php wp_pagenavi(); ?>

	<?php } else { ?>

	<nav id="nav-below">
	<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'birds-portfolio' ); ?></h1>
	<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'birds-portfolio' ) ); ?></div>
	<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'birds-portfolio' ) ); ?></div>
	</nav><!-- #nav-below -->

	<?php } ?>
	<?php endif; ?>

	</div>

<?php get_footer(); ?>