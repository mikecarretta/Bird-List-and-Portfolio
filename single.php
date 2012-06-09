<?php get_header(); ?>

		<div class="row">

			<?php while ( have_posts() ) : the_post(); ?>

					<!-- Page Title Header-->
					<div id="mainHeader" class="row"> 

						<div id="header">
						<h1><?php the_title(); ?></h1>
						
						</div><!-- END #header -->

					</div><!-- END #mainHeader .row -->

			<div class="nine columns" id="content">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
						<div class="entry-meta">
							<?php
								printf( __( '<span class="meta-prep meta-prep-author">Posted on </span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s" pubdate>%3$s</time></a> <span class="meta-sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span>', 'bird-portfolio' ),
									get_permalink(),
									get_the_date( 'c' ),
									get_the_date(),
									get_author_posts_url( get_the_author_meta( 'ID' ) ),
									sprintf( esc_attr__( 'View all posts by %s', 'bird-portfolio' ), get_the_author() ),
									get_the_author()
								);
							?>
						</div><!-- .entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bird-portfolio' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php
							$tag_list = get_the_tag_list( '', ', ' );
							if ( '' != $tag_list ) {
								$utility_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bird-portfolio' );
							} else {
								$utility_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bird-portfolio' );
							}
							printf(
								$utility_text,
								get_the_category_list( ', ' ),
								$tag_list,
								get_permalink(),
								the_title_attribute( 'echo=0' )
							);
						?>

						<?php edit_post_link( __( 'Edit', 'bird-portfolio' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post-<?php the_ID(); ?> -->

				<nav class="post-nav">
					<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'bird-portfolio' ); ?></h1>
					<?php previous_post_link('<span class="prev">%link</span>', '<span class="arrow">&laquo;</span> %title') ?>				<?php next_post_link('<span class="next">%link</span>', '<span class="arrow">&raquo;</span> %title') ?>
				</nav><!-- #post-nav -->

				<?php if ( comments_open() ) {
					comments_template( '', true );
                } ?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- END .nine columns #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>