<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creativconcept
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="menu">
	<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
		) );
	?>
	<div id="menu_phone">
    	<a href="tel:+499416466880">+49 941 6466880</a>
  	</div>
	<div id="menu_socialmedia" class="smaller">
		<a href="https://www.instagram.com/creativconcept/" target="_blank">Instagram</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="https://www.facebook.com/creativconcept.de" target="_blank">Facebook</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="https://de.linkedin.com/company/creativ-concept-werbeagentur-gmbh" target="_blank">LinkedIn</a>
	</div>
	<div id="menu_submenu" class="smaller">
  		<a href="https://creativconcept.de/datenschutz" target="_blank">Datenschutz</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://creativconcept.de/impressum" target="_blank">Impressum</a>
	</div>
</div>

<div id="page" class="site">

	<header id="masthead">
		
		<div id="nav_button" onclick="menuToggle(this)">
			<div class="bar1"></div>
			<div class="bar2"></div>
		</div> <!-- #nav_button -->

		<div id="logo">
			<a href="<?php echo get_home_url(); ?>">
				<img src="<?php echo get_template_directory_uri();?>/images/logo_creativconcept.svg">
			</a>
		</div> <!-- #logo -->

	</header><!-- #masthead -->
