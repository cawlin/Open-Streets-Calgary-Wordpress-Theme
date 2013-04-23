<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Open Streets Calgary
 */
?>

</div><!-- .container -->

<footer id="colophon" class="row" role="contentinfo">
	<div class="container">	
		<div class="row">
			<div class="span4" id="footer-left">
				<?php dynamic_sidebar( 'footer-widget-left' ); ?>
			</div>
			<div class="span4" id="footer-middle">
				<?php dynamic_sidebar( 'footer-widget-middle' ); ?>
			</div>
			<div class="span4" id="footer-right">
				<h4>Subscribe to Our Newsletter</h4>
				<script type="text/javascript" src="http://www.formstack.com/forms/js.php?1457049-3OIpaBm6m0-v3&jsonp"></script><noscript><a href="http://www.formstack.com/forms/?1457049-3OIpaBm6m0" title="Online Form">Online Form - Constant Contact Signup Form</a></noscript>
				<a href="http://www.formstack.com/try-formstack?utm_source=h&utm_medium=jsembed&utm_campaign=fa&fa=h,1457049" title="Web Form Generator"></a>
				
			</div>
		</div><!-- .row -->
	</div><!-- .container -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>