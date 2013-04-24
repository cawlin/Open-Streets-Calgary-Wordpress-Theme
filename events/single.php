<?php
/**
* A single event.  This displays the event title, description, meta, and 
* optionally, the Google map for the event.
*
* You can customize this view by putting a replacement file of the same name (single.php) in the events/ directory of your theme.
*/

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }
?>

<div id="single-event-container">
	<?php
		$gmt_offset = (get_option('gmt_offset') >= '0' ) ? ' +' . get_option('gmt_offset') : " " . get_option('gmt_offset');
	 	$gmt_offset = str_replace( array( '.25', '.5', '.75' ), array( ':15', ':30', ':45' ), $gmt_offset );
 	
		if (strtotime( tribe_get_end_date(get_the_ID(), false, 'Y-m-d G:i') . $gmt_offset ) <= time() ) { ?>
	
		<div class="event-passed"><?php  _e('This event has passed.', 'tribe-events-calendar'); ?></div>
	
	<?php } ?>

	<?php if (tribe_get_start_date() !== tribe_get_end_date() ) { ?>
	
		<meta itemprop="startDate" content="<?php echo tribe_get_start_date( null, false, 'Y-m-d-h:i:s' ); ?>"/><?php echo tribe_get_start_date(); ?> - <meta itemprop="endDate" content="<?php echo tribe_get_end_date( null, false, 'Y-m-d-h:i:s' ); ?>"/><?php echo tribe_get_end_date(); ?>
	
	<?php } else { ?>

		<!-- just the date -->	
		<?php _e('Date:', 'tribe-events-calendar'); ?>
		<meta itemprop="startDate" content="<?php echo tribe_get_start_date( null, false, 'Y-m-d-h:i:s' ); ?>"/><?php echo tribe_get_start_date(); ?>	
	<?php } ?>

	<div class="entry-content">
		<?php
		if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) {?>
			<?php the_post_thumbnail(); ?>
		<?php } ?>
		<div class="summary"><?php the_content(); ?></div>
		<?php if (function_exists('tribe_get_ticket_form') && tribe_get_ticket_form()) { tribe_get_ticket_form(); } ?>		
	</div>

	<?php if( function_exists('tribe_get_single_ical_link') ): ?>
	   <a class="ical single" href="<?php echo tribe_get_single_ical_link(); ?>"><?php _e('iCal Import', 'tribe-events-calendar'); ?></a>
	<?php endif; ?>

	<?php if( function_exists('tribe_get_gcal_link') ): ?>
	   <a href="<?php echo tribe_get_gcal_link(); ?>" class="gcal-add" title="<?php _e('Add to Google Calendar', 'tribe-events-calendar'); ?>"><?php _e('+ Google Calendar', 'tribe-events-calendar'); ?></a>
	<?php endif; ?>


	<div class="single-event-meta">
	
	<ul>
			<!-- venue -->
		<?php if(tribe_get_venue()) : ?>
		
			<li>
				<?php if( class_exists( 'TribeEventsPro' ) ): ?>
					<strong><?php tribe_get_venue_link( get_the_ID(), class_exists( 'TribeEventsPro' ) ); ?></strong>
				<?php else: ?>
					<strong><?php echo tribe_get_venue( get_the_ID() ); ?></strong>
				<?php endif; ?>
			</li>
		
		<?php endif; ?>
	
		<!-- address -->
		<?php if( tribe_address_exists( get_the_ID() ) ) : ?>
		
			<li>
				<?php echo tribe_get_full_address( get_the_ID() ); ?>
			</li>
			
			<?php if( tribe_show_google_map_link( get_the_ID() ) ) : ?>
				<li>
					<a class="gmap" itemprop="maps" href="<?php echo tribe_get_map_link(); ?>" title="<?php _e('Click to view a Google Map', 'tribe-events-calendar'); ?>" target="_blank"><?php _e('Google Map', 'tribe-events-calendar' ); ?></a>
				</li>
				<?php endif; ?>			
		<?php endif; ?>
	
		<!-- phone number -->

		<?php if(tribe_get_phone()) : ?>
			<li>
				<?php _e('Phone:', 'tribe-events-calendar'); ?>
				<?php echo tribe_get_phone(); ?>
			</li>
		<?php endif; ?>
	
		<?php if ( class_exists('TribeEventsRecurrenceMeta') && function_exists('tribe_get_recurrence_text') && tribe_is_recurring_event() ) : ?>
		
			<li>
				<?php _e('Schedule:', 'tribe-events-calendar'); ?>
				<?php echo tribe_get_recurrence_text(); ?> 
			</li>
           
			<?php if( class_exists('TribeEventsRecurrenceMeta') && function_exists('tribe_all_occurences_link')): ?>
				<li>
					(<a href='<?php tribe_all_occurences_link(); ?>'>See all</a>)
				</li>
			<?php endif; ?>
		
		<?php endif; ?>
	</ul>


				
		<!-- cost -->
		<?php if ( tribe_get_cost() ) : ?>
			<p>
				<strong><?php _e('Cost:', 'tribe-events-calendar'); ?>
				<?php echo tribe_get_cost(); ?></strong>
			</p>
		<?php endif; ?>

		<?php tribe_meta_event_cats(); ?>
	
		<ul>	
			<!-- organizer with link -->
			<?php if ( tribe_get_organizer_link( get_the_ID(), false, false ) ) : ?>
			
				<li>
					<?php _e('Organizer:', 'tribe-events-calendar'); ?>
					<?php echo tribe_get_organizer_link(); ?>
				</li>
			
			<!-- organizer without link -->	
	      	<?php elseif (tribe_get_organizer()): ?>
			
				<li>
					<?php _e('Organizer:', 'tribe-events-calendar'); ?>
					<?php echo tribe_get_organizer(); ?>
				</li>
			
			<?php endif; ?>
		
			<!-- organizer phone number -->
			<?php if ( tribe_get_organizer_phone() ) : ?>
		
				<li>
					<?php _e('Phone:', 'tribe-events-calendar'); ?>
					<?php echo tribe_get_organizer_phone(); ?>
				</li>
			
			<?php endif; ?>
		
			<!-- organizer email -->
			<?php if ( tribe_get_organizer_email() ) : ?>
			
				<li>
					<?php _e('Email:', 'tribe-events-calendar'); ?></dt>
					<a href="mailto:<?php echo tribe_get_organizer_email(); ?>"><?php echo tribe_get_organizer_email(); ?></a>
				</li>
			
			<?php endif; ?>
		</ul>
  
	   	<?php if( function_exists('tribe_the_custom_fields') && tribe_get_custom_fields( get_the_ID() ) ): ?>
		  	<ul>
				<li>
					<?php tribe_the_custom_fields( get_the_ID() ); ?>
				</li>
			</ul>
		<?php endif; ?>
	
	<?php if( tribe_embed_google_map( get_the_ID() ) ) : ?>
	<?php if( tribe_address_exists( get_the_ID() ) ) { echo tribe_get_embedded_map(); } ?>
	<?php endif; ?>

	</div>

	<hr />

	<p><a href="<?php echo tribe_get_events_link(); ?>"><?php _e('&laquo; Back to Events', 'tribe-events-calendar'); ?></a></p>

</div>
