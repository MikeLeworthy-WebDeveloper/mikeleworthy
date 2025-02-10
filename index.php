<?php get_header(); ?>

	<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();

        get_template_part( 'content', get_post_format());  // the content for POSTS (index.php is set as show posts in reading settings)

	endwhile; endif;
	?>

<?php get_footer(); ?>