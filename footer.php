<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package Cryout Creations
 * @subpackage nirvana
 * @since nirvana 0.5
 */
?>	<div style="clear:both;"></div>
	</div> <!-- #forbottom -->


	<footer id="footer" role="contentinfo">
		<div id="colophon">
		
			<?php get_sidebar( 'footer' );?>

    <!-- HCC addition, adding footer bottom widget -->
    <?php if( is_active_sidebar('footer-bottom-widget') ) : ?>
      <div class="footer-bottom-container">
        <?php dynamic_sidebar('footer-bottom-widget'); ?>
      </div>
    <?php endif; ?>

			
		</div><!-- #colophon -->

<!--
		<div id="footer2">
			<div id="footer2-inside">
			<?php //cryout_footer_hook(); ?>
			</div>
		</div>

-->

	</footer><!-- #footer -->
	</div><!-- #main -->
</div><!-- #wrapper -->


<?php	wp_footer(); ?>

</body>
</html>
