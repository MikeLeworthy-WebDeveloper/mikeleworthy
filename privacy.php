<?php 
/* Template Name: Privacy */
?>

<?php get_header(); ?>

    <div class="grid-container">

        <div class="grid-x">

        	<div class="cell small-12 xlarge-6">

	        	<div class="privacy-policy-content">

				<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post();

					the_content(); // the content for PAGES
			        
				endwhile; endif;
				?>

			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>