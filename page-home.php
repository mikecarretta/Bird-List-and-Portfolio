<?php

/* Template Name: Home Page-Full Width */

get_header(); ?>

<?php HomeFeatureItem(); ?>

<div class="row" id="birdListHomePage">
	<div id="homePageWidget" class="six columns">
		
		<?php if ( ! dynamic_sidebar('homepage-1') ) : ?>
    	
		<?php endif; ?>

	</div><!-- END .six columns #content -->
	
	<div id="homePageWidget" class="six columns">
	
		<?php if ( ! dynamic_sidebar('homepage-2') ) : ?>

		<?php endif; ?>
		
	</div><!-- END .six columns #content -->

</div><!-- END .row #main -->

<?php get_footer(); ?>