<div class="three columns" id="sidebarBirds">
	<aside>
	<ul>

	<li id="categories" class="widget-container">
		<h3 class="widget-title">Bird Details</h3>
		<ul>
		<li>
			
			<div class="entry-meta-custom">
				<?php if (get_the_term_list( $post->ID, 'bird-name' ) != null ) { ?>
					<div>Name: <?php echo get_the_term_list( $post->ID, 'bird-name', '', ', ', '' ); ?></div>
				<?php } ?>
				<?php if (get_the_term_list( $post->ID, 'bird-order' ) != null ) { ?>
					<div>Order: <?php echo get_the_term_list( $post->ID, 'bird-order', '', ', ', '' ); ?></div>
				<?php } ?>
				<?php if (get_the_term_list( $post->ID, 'bird-family' ) != null ) { ?>
					<div>Family: <?php echo get_the_term_list( $post->ID, 'bird-family', '', ', ', '' ); ?></div>
				<?php } ?>
				<?php if (get_the_term_list( $post->ID, 'bird-tags' ) != null ) { ?>
					<div>Tags: <?php echo get_the_term_list( $post->ID, 'bird-tags', '', ', ', '' ); ?></div>
				<?php } ?>
				
			</div><!-- END.entry-meta-custom -->
		
		</li>
		</ul>
	</li>

	<li id="meta" class="widget-container">
		<h3 class="widget-title">Featured Photograph EXIF</h3>
		<ul>
			<li id="exifData">
			
			<?php pa_the_post_thumbnail_exif_data(); ?>

			</li>
		</ul>
	</li>

	<?php if ( ! dynamic_sidebar('single-bird-detail') ) : ?>
	<?php endif; ?>
</ul>
</aside>

</div><!-- END .three columns #sidebar -->