<?php
/**
 * Template Name: homepage
 * 
 * The template for displaying our custom homepage
 *
 * @package Open Streets Calgary
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	
<article id="homepage">	
	<div id="splash">
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
	</div>
	
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="row">
		<div class="span7">
	  		<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'open_streets_calgary' ), 'after' => '</div>' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'open_streets_calgary' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
		</div><!-- .span7 -->
		<div id="quote-widget" class="span4 offset1">
			<img src="<?php bloginfo('template_directory'); ?>/images/large-quote.gif" width="38" height="28" alt="Quote:" class="large-quote">
			<?php dynamic_sidebar( 'homepage-quote-area' ); ?>
		</div><!-- .span4 -->
	</div><!-- .row -->
</article><!-- #post-## -->

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
