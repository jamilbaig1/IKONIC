<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ikonic_test
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">

				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'IKONIC Test © 2024. All Rights Reserved.' ), 'ikonic-test' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
