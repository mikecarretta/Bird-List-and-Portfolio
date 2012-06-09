</div><!-- END .container main-->

<div class="container" id="footer">	
	
	<div class="row" id="footerWidgets">
		
		<?php if ( is_active_sidebar('footer-1') ||
				is_active_sidebar('footer-2') || 
				is_active_sidebar('footer-3') ) : ?>
					
				<?php $i = 0; while ( $i <= 3 ) : $i++; ?>			
		<?php if ( is_active_sidebar('footer-'.$i) ) { ?>
			
			<div class="four columns" id="footerWidgetsContainer">
	
				<?php dynamic_sidebar('footer-'.$i); ?> 
	
			</div><!-- END .four columns #footer -->
		
		<?php } ?>
		<?php endwhile; ?>
		<?php endif; ?>

	</div><!-- END .row #footerWidgets -->
</div><!-- END .container #footer -->

<div class="container" id="siteFooter">
		
	<div class="row" id="footerSiteGenerator">
		
			<p><?php if (!$footer = of_get_option('footer_text', false) ) { ?>
			<?php _e('Powered by', 'bird-portfolio'); ?> <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'bird-portfolio' ); ?>" rel="generator"><?php printf( __( 'WordPress', 'bird-portfolio' ) ); ?></a> &amp; <a href="http://mikecarretta.com/news/birds-portfolio-and-list-responsive-wordpress-theme/"><?php _e('Bird Portfolio Theme', 'bird-portfolio'); ?>.</a>
            <?php } else {
				echo stripslashes($footer);
			} ?>
            </p>

	</div><!-- END .row #footerSiteGenerator-->

</div><!-- END .container #siteFooter-->

<?php wp_footer(); ?>
	
</body>

</html>
