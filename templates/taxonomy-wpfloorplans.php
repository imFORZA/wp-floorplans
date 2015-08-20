<?php get_header(); ?>

	<div class="wpfloorplans-page-container">

	<h1>Floor Plans</h1>
	
		<div class="wpfloorplans-archive-row">

			<?php if (have_posts()) : 
				
				$posts = query_posts($query_string . '&orderby=title&order=asc&posts_per_page=-1');
				
				while (have_posts()) : the_post(); ?>
		
				<div class="wpfloorplans-archive-col">
					
					<div class="wpfloorplans-archive-floorplan">
						
						<h2 class="wpfloorplans-floorplan-title"><?php the_title(); ?></h2>
			
						<div class="wp-floorplans-archive-photo">
							<a href="<?php the_permalink(); ?>">
								<?php if(has_post_thumbnail()) {
									the_post_thumbnail(); } ?>
							</a>
						</div><!--/wp-floorplans-archive-photo-->
			
						<ul>
							<?php 
							if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_style', true) == '') {} else {
								echo '<li><label>Style:&nbsp;</label>', wpfloorplans_style(); '</li>'; }
							if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_sqft', true) == '') {} else {
								echo '<li><label>Square Footage:&nbsp;</label>', wpfloorplans_sqft(); '</li>'; }
							if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_beds', true) == '') {} else {
								echo '<li><label>Bedrooms:&nbsp;</label>', wpfloorplans_beds(); '</li>'; }
							if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_baths', true) == '') {} else {
								echo '<li><label>Baths:&nbsp;</label>', wpfloorplans_baths(); '</li>'; }
							if(get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_price', true) == '') {} else {
								echo'<li><label>Priced From:&nbsp;</label>', wpfloorplans_price(); '</li>'; } ?>
						</ul>
						
					</div><!--/wpfloorplans-archive-floorplan-->
				
				</div><!--/wpfloorplans-archive-col-->

			<?php endwhile; endif; ?>
	
		</div><!--/wpfloorplans-archive-row-->
	
	</div><!--/wpfloorplans-page-container-->

<?php get_footer(); ?>