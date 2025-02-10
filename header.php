<!doctype html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="author" content="">
	<title><?php echo get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' ); ?></title>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 
	//get_template_part( 'parts/dev', 'grid' ); // load the overlay grid for development
?>


<header>
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell small-6 medium-4">
				<a href="<?php echo home_url('/'); ?>">
					<img class="main-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/main-wordmark.svg" alt="Mike Leworthy - Web Developer Logo">
				</a>
			</div>
			<div class="cell small-6 medium-8">
				<div class="nav-burger hide-for-medium">
					<span></span>
					<span></span>
				</div>
				<div class="show-for-medium">
					<?php wp_nav_menu( array( 'theme_location' => 'main-navigation', ) ); ?>
				</div>
			</div>
		
		</div>
	</div>
</header>

<div class="navigation-container hide-for-large">
	<div class="navigation-container-inner">
		<?php wp_nav_menu( array( 'theme_location' => 'main-navigation', ) ); ?>
	</div>
	<div class="navigation-container-inner">
		<a href="mailto:hey@mikeleworthy.co.uk" target="_blank">hey@mikeleworthy.co.uk</a>
		<a href="https://www.instagram.com/mikeleworthy_web_developer/" target="_blank">Instagram</a>
	</div>
</div>

<div id="content">