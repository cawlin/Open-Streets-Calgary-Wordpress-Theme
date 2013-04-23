<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Open Streets Calgary
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<article <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="row">
		<div class="span7">
	  		<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'open_streets_calgary' ), 'after' => '</div>' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'open_streets_calgary' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
		</div><!-- .span7 -->
		<div id="page-sidebar" class="span4 offset1">
			<?php
				// add featured thumbnail and extra featured thumbnails via plugin
				if ( has_post_thumbnail() ) { the_post_thumbnail(); }
				if( class_exists( 'kdMultipleFeaturedImages' ) ) {
			    	kd_mfi_the_featured_image( 'featured-image-2', 'page' );
					kd_mfi_the_featured_image( 'featured-image-3', 'page' );
				}
			?>
		</div><!-- #page-sidebar -->
	</div><!-- .row -->
</article><!-- #post-## -->

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
