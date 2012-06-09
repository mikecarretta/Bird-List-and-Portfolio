<?php

/* Template Name: Bird List */

get_header(); ?>

<!-- Page Title and Bird Post Count Header-->
	<div id="mainHeader" class="row"> 

			<div class="twelve columns" id="header">
				<h1 id="birdCountHeader"><?php wp_title("",true); ?></h1>
				
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

	</div><!-- END #mainHeader .row-->

<?php get_template_part( 'content-birds' );

get_footer(); ?>