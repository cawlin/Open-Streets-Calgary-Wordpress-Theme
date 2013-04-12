<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Open Streets Calgary
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'open_streets_calgary_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'open_streets_calgary' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'open_streets_calgary' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'open_streets_calgary' ), 'Open Streets Calgary', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>