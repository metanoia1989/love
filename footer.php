<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
        </div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-fluid">
		<div class="site-info row">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', '_love' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Powered by %s ', 'love' ), 'WordPress' );
			?></a>
			<span class="sep"> and </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme by  %1$s  &copy;2018 %2$s.', 'love' ), 'love', '<a href="https://blog.metanoia1989.com/">metanoia1989</a>' );
            ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
