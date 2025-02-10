<?php
	$pobj = get_queried_object();
	$this_page_id = $pobj->ID;		
/**
 * Template Name: Project
 * Template Post Type: project
 *
*/
get_header();?>
<?php flex_content_layout_blocks_projects($this_page_id); ?>
<div class="grid-container">
	<div class="grid-x">
		<div class="cell small-12">







			<?php
		    	wp_reset_postdata();
		    	$myargs = array (
		        	'showposts' => -1,
		        	'post_type' => 'project'
		    	);
		    	$myquery = new WP_Query($myargs);
		        if($myquery->have_posts() ) :
		            while($myquery->have_posts() ) : $myquery->the_post(); ?>
						<h2><?php the_title(); ?></h2>
						<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
				    <?php endwhile;
				endif;
				wp_reset_postdata();
			?>
		</div>
	</div>
</div>


<?php get_footer(); ?>  