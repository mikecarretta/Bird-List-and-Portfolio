<?php

/* Template Name: Portfolio Full Width */

get_header(); ?>

<!-- Page Title Header-->
<div id="mainHeader" class="row"> 

	<div id="header">
		<h1><?php wp_title("",true); ?></h1>
	</div>
	
</div>

<?php get_template_part( 'content-portfolio' );

get_footer(); ?>