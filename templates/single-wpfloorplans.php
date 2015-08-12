<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>
	<p><?php the_content(); ?></p>
	<ul>
		<li><?php wpfloorplans_style(); ?></li>
		<li><?php wpfloorplans_sqft(); ?></li>
		<li><?php wpfloorplans_beds(); ?></li>
		<li><?php wpfloorplans_baths(); ?></li>
		<li><?php wpfloorplans_garages(); ?></li>
		<li><?php wpfloorplans_price(); ?></li>
		<li><a href="<?php wpfloorplans_brochure_url(); ?>">View Brochure</a></li>
	</ul>
	<div>
		<?php wpfloorplans_floorplan_gallery(); ?>
	</div>
	<div>
		<?php wpfloorplans_photo_gallery(); ?>
	</div>
	<div>
		<?php wpfloorplans_listing_gallery(); ?>
	</div>
	
	<?php endwhile; endif; ?>
	
<?php get_footer(); ?>