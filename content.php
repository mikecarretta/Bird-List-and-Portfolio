<?php $thumbnail = 'birds-thumbnail'; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if (has_post_thumbnail ( )) { ?>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'bird-portfolio' ); ?> <?php the_title_attribute(); ?>" class="thumbExcerpt"><?php the_post_thumbnail( $thumbnail ); ?></a>
	<?php } ?>
	
	<header class="entry-header">
		
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bird-portfolio' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		
		<div class="entry-meta">
			<?php
				printf( __( '<a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s" pubdate>%3$s</time></a> <span class="meta-sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span>', 'bird-portfolio' ),
					get_permalink(),
					get_the_date( 'c' ),
					get_the_date(),
					get_author_posts_url( get_the_author_meta( 'ID' ) ),
					sprintf( esc_attr__( 'View all posts by %s', 'bird-portfolio' ), get_the_author() ),
					get_the_author()
				);
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	
	<div class="entry-summary">
		<?php folio_excerpt('folio_excerpt_length','folio_excerpt_more'); ?>
	</div><!-- .entry-summary -->


	<footer class="entry-meta">
		<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'bird-portfolio' ); ?></span><?php the_category( ', ' ); ?></span>
		<span class="meta-sep"> | </span>
		<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'bird-portfolio' ) . '</span>', ', ', '<span class="meta-sep"> | </span>' ); ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'bird-portfolio' ), __( '1 Comment', 'bird-portfolio' ), __( '% Comments', 'bird-portfolio' ) ); ?></span>
		<?php edit_post_link( __( 'Edit', 'bird-portfolio' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-meta -->

</article><!-- #post-<?php the_ID(); ?> -->