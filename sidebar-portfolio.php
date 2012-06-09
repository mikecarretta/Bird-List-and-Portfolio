<div class="three columns" id="sidebarPortfolio">
	<aside>
	<ul>

	<li id="categories" class="widget-container">
		<h3 class="widget-title">EXIF Details</h3>
		<ul>
			<li>

				<?php pa_the_post_thumbnail_exif_data(); ?>

			</li>
		</ul>
	</li>

	<li id="meta" class="widget-container">
		<h3 class="widget-title">Categories</h3>
		<ul>
			<li>
				<?php if (get_the_term_list( $post->ID, 'portfolio_category' ) != null ) { ?>
					<div>Category: <?php echo get_the_term_list( $post->ID, 'portfolio_category', '', ', ', '' ); ?></div>
				<?php } ?>
				
				<?php if (get_the_term_list( $post->ID, 'portfolio_tag' ) != null ) { ?>
					<div>Tags: <?php echo get_the_term_list( $post->ID, 'portfolio_tag', '', ', ', '' ); ?></div>
				<?php } ?>
			</li>
		</ul>
	</li>

	<?php if ( ! dynamic_sidebar('portfolio-bird-detail') ) : ?>
	<?php endif; ?>
	
</ul>
</aside>

</div><!-- END .three columns #sidebar -->