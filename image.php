<?php get_header(); ?>

<div class="row" id="main">
<div class="twelve columns">

	<?php the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</header><!-- .entry-header -->

	<div class="entry-content">

		<div class="entry-attachment">
			<div class="imageAttachment">
				<?php
				/**
	 			* Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
	 			* or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
	 			*/
				$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
				foreach ( $attachments as $k => $attachment ) {
					if ( $attachment->ID == $post->ID )
						break;
				}
				$k++;
				// If there is more than 1 attachment in a gallery
				if ( count( $attachments ) > 1 ) {
					if ( isset( $attachments[ $k ] ) )
						// get the URL of the next image attachment
						$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
					else
						// or get the URL of the first image attachment
						$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
				} else {
					// or, if there's only 1 image, get the URL of the image
					$next_attachment_url = wp_get_attachment_url();
				}
				?>
				
				<a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
				$attachment_size = apply_filters( 'theme_attachment_size',  'large' );
				echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
				?></a>
			
		</div><!-- .imageAttachment -->

				<?php if ( ! empty( $post->post_excerpt ) ) : ?>
				<div class="entry-caption">
					<?php the_excerpt(); ?>
				</div>
				<?php endif; ?>
			</div><!-- .entry-attachment -->

			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bird-portfolio' ), 'after' => '</div>' ) ); ?>

			<nav id="post-nav">
				<div class="nav-previous"><?php previous_image_link( false, __( '&larr; Previous Photo' , 'bird-portfolio' ) ); ?></div>
				<div class="nav-next"><?php next_image_link( false, __( 'Next Photo &rarr;' , 'bird-portfolio' ) ); ?></div>
			</nav><!-- #post-nav -->
			
	</div><!-- .entry-content -->

	<div class="entry-utility">
		<?php if ( comments_open() && pings_open() ) : // Comments and trackbacks open ?>
			<?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'bird-portfolio' ), get_trackback_url() ); ?>
		<?php elseif ( ! comments_open() && pings_open() ) : // Only trackbacks open ?>
			<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'bird-portfolio' ), get_trackback_url() ); ?>
		<?php elseif ( comments_open() && ! pings_open() ) : // Only comments open ?>
			<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'bird-portfolio' ); ?>
		<?php elseif ( ! comments_open() && ! pings_open() ) : // Comments and trackbacks closed ?>
			<?php _e( 'Both comments and trackbacks are currently closed.', 'bird-portfolio' ); ?>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'bird-portfolio' ), ' <span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-utility -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php comments_template(); ?>

</div><!-- END #content .twelve columns -->
</div><!-- END #main .row -->

<?php get_footer(); ?>