<?php
    $pobj = get_queried_object();
    $this_page_id = $pobj->ID;      
?>
<?php 
/* Template Name: Projects
*/
?>
<?php get_header(); ?>
<?php flex_content_layout_blocks($this_page_id); ?>
<?php get_footer(); ?>