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
	<div id="menu_socialmedia" class="smaller">
		<a href="https://www.instagram.com/creativconcept/" target="_blank">Instagram</a>&nbsp;&nbsp;//&nbsp;&nbsp;<a href="https://www.facebook.com/creativconcept.de" target="_blank">Facebook</a>
	</div>
	<div id="menu_submenu" class="smaller">
		<a href="https://dev.creativconcept.de/datenschutz" target="_blank">Datenschutz</a>&nbsp;&nbsp;//&nbsp;&nbsp;<a href="https://dev.creativconcept.de/impressum" target="_blank">Impressum</a>
	</div>
</div>

<div id="page" class="site">

	<header id="masthead">
		
		<div id="nav_button" onclick="menuToggle(this)">
			<div class="bar1"></div>
			<div class="bar2"></div>
		</div> <!-- #nav_button -->

		<div id="logo">
			<a href="<?php echo get_home_url(); ?>/arbeiten">
				<img src="<?php echo get_template_directory_uri();?>/images/logo_creativconcept.svg">
			</a>
		</div> <!-- #logo -->

	</header><!-- #masthead -->
<!--
	<div id="video_container">
		<video autoplay="" loop="" muted="" poster="<?php echo get_template_directory_uri();?>/video/Loading_Screen_Video.gif" 
		src="<?php echo get_template_directory_uri();?>/video/Creativconcept_Imagefilm_Shortversion.mp4"></video>
	</div>
-->

	<div id="video_container">
		<a id="video_link" target="_blank">
			<video id="herovideo" autoplay="" loop="" muted="" poster="<?php echo get_template_directory_uri();?>/video/Loading_Screen_Video.gif"></video>
		</a>
	</div>

	<script type="text/javascript">

		jQuery(document).ready(function() {

			var breakpoint = 1024;

			loadVideo();

			// Pause when page is not in the foreground
			jQuery(window).blur(function() {
				jQuery('#herovideo')[0].pause();
			});

			// Play when page returns to the foreground
			jQuery(window).focus(function() {
				if (jQuery(document).width() > breakpoint) {
					jQuery('#herovideo')[0].play();
				}
			});

			// Play video when page resizes
			jQuery(window).resize(function() {
				loadVideo();
			});

			// Play when page returns from browser history button
			window.onpopstate = function() {
				if (jQuery(document).width() > breakpoint) {
					jQuery('#herovideo')[0].play();
				}
			};

			function loadVideo() {
				var video = document.getElementById('herovideo');
				var video_link = document.getElementById('video_link');

				// Remove existing source tags for mobile
				if (jQuery(document).width() < breakpoint + 1) {
					while (video.firstChild) {
						video.removeChild(video.firstChild);
					}
					video.setAttribute('poster', 'https://dev.creativconcept.de/wp-content/themes/creativconcept/images/Loading_Screen_Video_Mobile.jpg');
					video_link.setAttribute('href', 'https://www.youtube.com');
				}

				// Add source tags if not already present
				if (jQuery(document).width() > breakpoint) {
					if (document.querySelectorAll("#herovideo > source").length < 1) {
						var source1 = document.createElement('source');

						source1.setAttribute('src', 'https://dev.creativconcept.de/wp-content/themes/creativconcept/video/Creativconcept_Imagefilm_Shortversion.mp4');
						source1.setAttribute('type', 'video/mp4');

						video.appendChild(source1);
					}

					// Play the video
					jQuery('#herovideo')[0].play();
				}
			}
		});
	</script>