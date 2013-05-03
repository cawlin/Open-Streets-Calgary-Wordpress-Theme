<?php
/**
 * 
 * Template Name: Events Template
 *
 * @package Open Streets Calgary
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<article <?php post_class(); ?>>
	<header class="entry-header event-template-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="row">
		<div class="span7">
	  		<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'open_streets_calgary' ), 'after' => '</div>' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'open_streets_calgary' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
		</div><!-- .span7 -->
		<div id="event-sidebar" class="span4 offset1">
			<?php dynamic_sidebar( 'events-list-sidebar' ); ?>
		</div><!-- #page-sidebar -->
	</div><!-- .row -->
</article><!-- #post-## -->

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
