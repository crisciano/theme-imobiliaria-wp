<!DOCTYPE html>
<html lang="en">
<head>
	<?php $base = get_template_directory_uri(); ?>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="<?=$base?>/style.css">
	<link rel="stylesheet" href="<?=$base?>/assets/plugins/bootstrap/bootstrap.min.css">

	<title>
		<?php bloginfo('name'); 
		if (!is_home()) {
			echo ' | ';
			the_title();
		}

		?>
	</title>

	<?php wp_head(); ?>
</head>
<body>

	<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
		<nav id="nav" class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">
			<div class="container">
				<div class="row">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'header-menu',
								'menu_class'     => 'main-menu',
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							)
						);
					?>
				</div>
			</div>
		</nav><!-- #site-navigation -->
	<?php endif; ?>
	<?php 
		echo get_custom_logo( 0 );
		// $custom_logo_id = get_theme_mod( 'custom_logo' );
		// echo $custom_logo_id;
		// $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		// echo $image[0];
	?>

	<header>
		<div class="container">
			<!-- <?php 

				// $args = array( 'theme_location' => 'header-menu' );

				// wp_nav_menu($args);

			?> -->
		</div>
	</header>


	<!-- <?php include('navbar.php'); ?> -->
	<!-- <h1>header</h1> -->