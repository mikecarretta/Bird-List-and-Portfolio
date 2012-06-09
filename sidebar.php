<div class="three columns" id="sidebar">
	<aside>
	<ul>
    	<?php if ( ! dynamic_sidebar('sidebar') ) : ?>
    
<!-- Below widget only show when there are no widgets active -->
		<li id="searchform" class="widget-container widget_search">
    		<?php get_search_form(); ?>
		</li>

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'bird-portfolio' ); ?></h3>
	<ul>
		<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
	</ul>
	</li>

	<li id="meta" class="widget-container">
		<h3 class="widget-title"><?php _e( 'Meta', 'bird-portfolio' ); ?></h3>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</li>
	
	<?php endif; ?>
	</ul>
	</aside>
	
	<aside>
		<ul>
			<li>
			<?php dynamic_sidebar('papt-image-sidebar'); ?>
			</li>
		</ul>
	</aside>

</div><!-- END .three columns #sidebar -->
</div><!-- END .row -->