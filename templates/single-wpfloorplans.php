<?php get_header(); ?>

	<div class="wpfloorplans-page-container">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<h1><?php the_title(); ?></h1>
			
			<!-- PHOTO SECTION -->
			
			<div class="wpfloorplans-single-photo">
				<?php if(has_post_thumbnail()) {
					the_post_thumbnail(); } ?>
			</div><!--/wp-floorplans-single-photo-->
			
			<!-- /PHOTO SECTION -->
			
			<div class="wpfloorplans-single-row">
				
				<!-- CONTENT SECTION -->
				
				<div class="wpfloorplans-single-col-left">		
					<?php the_content(); ?>
				</div><!--/wp-floorplans-single-col-left-->
				
				<!-- /CONTENT SECTION -->
				
				<!-- META DETAILS SECTION -->
			
				<div class="wpfloorplans-single-col-right">
					
					<ul class="wpfloorplans-single-detailsul">
						<?php 
							if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_style', true) == '') {} else {
								echo '<li><label>Style:&nbsp;</label>', wpfloorplans_style(); '</li>'; }
							if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_sqft', true) == '') {} else {
								echo '<li><label>Square Footage:&nbsp;</label>', wpfloorplans_sqft(); '</li>'; }
							if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_beds', true) == '') {} else {
								echo '<li><label>Bedrooms:&nbsp;</label>', wpfloorplans_beds(); '</li>'; }
							if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_baths', true) == '') {} else {
								echo '<li><label>Baths:&nbsp;</label>', wpfloorplans_baths(); '</li>'; }
							if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_garages', true) == '') {} else {
								echo '<li><label>Garage:&nbsp;</label>', wpfloorplans_garages(); '</li>'; }
							if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_price', true) == '') {} else {
								echo '<li><label>Priced From:&nbsp;</label>', wpfloorplans_price(); '</li>'; } ?>
					</ul>
					
					<?php if(!has_term('','highlights')) {} else {
						echo '<ul class="wpfloorplans-single-detailsul">',
							'<li style="text-transform:uppercase;font-weight:bold;text-align:center;">Highlights:</li>';
							echo get_the_term_list($post->ID, 'highlights', '<li class="wpfloorplans-highlight">', '</li><li class="wpfloorplans-highlight">', '</li>'); }
						echo '</ul>'; ?>
					
					<div class="wpfloorplans-single-buttons">
						<?php if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_brochure', true) == '') {} else { ?>
							<a class="wpfloorplans-btn" href="<?php wpfloorplans_brochure_url(); ?>" target="_blank">View Brochure</a>
						<?php } ?>
						<?php if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_virtual_tour', true) == '') {} else { ?>
							<a class="wpfloorplans-btn" href="<?php wpfloorplans_virtual_tour_url(); ?>" target="_blank">Virtual Tour</a>
						<?php } ?>
					</div><!--/wpfloorplans-single-buttons-->
					
				</div><!--/wp-floorplans-single-col-right-->
				
				<!-- /META DETAILS SECTION -->
				
			</div><!--/wpfloorplans-single-row-->
			
			<!-- GALLERY SECTION -->
			
			<?php
				if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_floorplan_gallery', true) == '') {} else {
					echo '<div class="wpfloorplans-single-gallery">',
						'<h3 class="wpfloorplans-gallery-title">Floorplans</h3>',
						wpfloorplans_floorplan_gallery() . '</div>'; }
					
				if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_photo_gallery', true) == '') {} else {
					echo '<div class="wpfloorplans-single-gallery">',
					'<h3 class="wpfloorplans-gallery-title">Photo Gallery</h3>',
					wpfloorplans_photo_gallery() . '</div>'; }
					
				if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_listings_gallery', true) == '') {} else {
					echo '<div class="wpfloorplans-single-gallery">',
					'<h3 class="wpfloorplans-gallery-title">Listings</h3>',
					wpfloorplans_listing_gallery() . '</div>'; }
			?>
	
			<!-- /GALLERY SECTION -->
	
		<?php endwhile; endif; ?>
	
	</div><!--/wpfloorplans-page-container-->
	
<?php get_footer(); ?>