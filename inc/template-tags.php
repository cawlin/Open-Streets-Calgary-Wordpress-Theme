<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Open Streets Calgary
 */

if ( ! function_exists( 'open_streets_calgary_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function open_streets_calgary_content_nav( $nav_id ) {
	global $wp_query, $post; }
endif; // open_streets_calgary_content_nav

if ( ! function_exists( 'open_streets_calgary_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function open_streets_calgary_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'open_streets_calgary' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'open_streets_calgary' ), '<span class="edit-link">', '<span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					
					<div class="comment-meta commentmetadata">
							<?php printf( __( '%s ', 'open_streets_calgary' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?><br />
						
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
						<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'open_streets_calgary' ), get_comment_date(), get_comment_time() ); ?>
						</time></a>
						<?php edit_comment_link( __( 'Edit', 'open_streets_calgary' ), '<span class="edit-link">', '<span>' ); ?>
					</div><!-- .comment-meta .commentmetadata -->
					
					
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _e( 'Your comment is awaiting moderation.', 'open_streets_calgary' ); ?></em>
						<br />
					<?php endif; ?>

					
				</div><!-- .comment-author .vcard -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for open_streets_calgary_comment()

if ( ! function_exists( 'open_streets_calgary_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function open_streets_calgary_posted_on() {
	printf( __( 'Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'open_streets_calgary' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'open_streets_calgary' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;
/**
 * Returns true if a blog has more than 1 category
 */
function open_streets_calgary_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so open_streets_calgary_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so open_streets_calgary_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in open_streets_calgary_categorized_blog
 */
function open_streets_calgary_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'open_streets_calgary_category_transient_flusher' );
add_action( 'save_post', 'open_streets_calgary_category_transient_flusher' );