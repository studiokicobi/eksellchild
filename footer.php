<?php

// Don't output the site footer on the Blank Canvas page template.
// The filter can be used to enable the blank canvas in different circumstances.
$blank_canvas 				= apply_filters('eksell_blank_canvas', is_page_template(array('page-templates/template-blank-canvas.php')));
$blank_canvas_with_aside 	= apply_filters('eksell_blank_canvas_with_aside', is_page_template(array('page-templates/template-blank-canvas-with-aside.php')));

// Output the site footer if we're not doing a blank canvas.
if (!($blank_canvas || $blank_canvas_with_aside)) :
?>

	<footer id="site-footer">

		<?php
		do_action('eksell_footer_start');
		?>

		<div class="footer-inner section-inner">

			<?php
			do_action('eksell_footer_inner_start');
			?>

			<div class="footer-credits">

				<p class="footer-copyright">&copy; <?php echo esc_html(date_i18n(esc_html__('Y', 'eksell'))); ?> <a href="<?php echo esc_url(home_url()); ?>" rel="home"><?php echo bloginfo('name'); ?></a></p>

			</div><!-- .footer-credits -->

			<?php
			/*
					 * @hooked eksell_the_footer_menu - 10
					 */
			do_action('eksell_footer_inner_end');
			?>

		</div><!-- .footer-inner -->

		<?php
		do_action('eksell_footer_end');
		?>

	</footer><!-- #site-footer -->

<?php
endif; // if ! $blank_canvas

wp_footer();

?>

</body>

</html>