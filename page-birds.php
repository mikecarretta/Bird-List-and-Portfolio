<?php

/* Template Name: Bird List */

get_header(); ?>

<!-- Page Title and Bird Post Count Header-->
	<div id="mainHeader" class="row"> 
		<div id="header">

			<div class="six columns">
				<h1 class="six columns"><?php wp_title("",true); ?></h1>
			</div>

			<div class="six columns">
				<h2 id="birdCount">	
					<span id="birdCountBox">
						<?php
						$published_posts = wp_count_posts( 'birds' )->publish;
						echo ($published_posts);
						?>
					</span>
					<span id="birdCountText"> Total Birds: </span>
				</h2>
			</div>

		</div><!-- END #header .row-->
	</div><!-- END #mainHeader .row-->

<?php get_template_part( 'content-birds' );

get_footer(); ?>