<?php
    $pobj = get_queried_object();
    $this_page_id = $pobj->ID;      
?>
<?php
// ________________________________________
// -- POST TEMPLATE
?>
<?php get_header(); ?>
<div class="grid-container">
	<div class="grid-x">
		<div class="cell small-12">
			<div class="project-post-top-content">
				<div class="project-post-title">
					<?php the_title(); ?>
				</div>
				<div class="full-width-image">
					<?php echo get_the_post_thumbnail(); ?>
				</div>
			</div>
			<!-- <?php
		    	wp_reset_postdata();
		    	$myargs = array (
		        	'showposts' => -1,
		        	'post_type' => 'projects'
		    	);
		    	$myquery = new WP_Query($myargs);
		        if($myquery->have_posts() ) :
		            while($myquery->have_posts() ) : $myquery->the_post(); ?>
						<h2><?php the_title(); ?></h2>
						<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
				    <?php endwhile;
				endif;
				wp_reset_postdata();
			?> -->
		</div>
	</div>
</div>
<?php flex_content_layout_blocks($this_page_id); ?>

<?php get_footer(); ?>