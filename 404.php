<?php get_header(); ?>

<div class="row" id="main">
	<div class="nine columns" id="content">
	
	<article id="post-0" class="post error404 not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'bird-portfolio' ); ?></h1>
		</header>
		
		<div class="entry-content">
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bird-portfolio' ); ?></p>

			<?php get_search_form(); ?>

		</div><!-- .entry-content -->
	</article><!-- #post-0 -->

</div><!-- END 9 columns CONTENT -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>