<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Open Streets Calgary
 */

get_header(); ?>
<div class="row">
	<div class="span7">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php open_streets_calgary_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- .span7 -->
	<div class="offset1 span4">
		<?php get_sidebar(); ?>
	</div>
</div><!-- .row -->

<?php get_footer(); ?>