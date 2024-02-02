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


<?php /* ?>
	<div id="video_container">
		<video autoplay="" loop="" muted="" poster="<?php echo get_template_directory_uri();?>/video/Loading_Screen_Video.gif" 
		src="<?php echo get_template_directory_uri();?>/video/Creativconcept_Imagefilm_Shortversion.mp4"></video>
	</div>
<?php */ ?>


	<div class="intro-animation-container">
    <div class="intro-white-wall"></div>
    <div class="intro-text-container page-container">
      <span class="intro-headline">
        <span class="intro-bold-text">Creativ</span><br class="intro-mobile-line-break"> wie immer.<br />Und mit neuem <span class="intro-bold-text">Concept</span>.
      </span>
      
      <span class="intro-headline intro-headline-2">
        Bereit<br class="intro-mobile-line-break"> für was neues?
      </span>
      <span class="intro-subheadline">#cczweipunktnull</span>
    </div>
    <div class="cta_scrolldown">
			<svg class="cta_arrow">
 				<path d="m37.6 62-23.6-19 2-2 21.6 15.8 21.4-15.8 2 2z" style="fill:#ff4539"/>
			</svg>

    	</div>
  </div>
	<style>
  
      .intro-text-container {
        z-index: 1;
        animation: moveuptext 2s 1s cubic-bezier(0.94, 0.01, 0.1, 1.06) forwards;
      }
  
      .intro-bold-text {
        font-weight: 900;
      }

      .intro-mobile-line-break {
        display: none;
      }
  
      .intro-headline {
        font-size: 3.5vw;
        animation: colorchange 2s 1s ease-in-out forwards;
        text-transform: uppercase;
        color: #f4f4f4;
        margin-bottom: 0;
        font-weight: 400;
        display: blocK;
      }
  
      .intro-headline-2 {
        margin-top: 3.5vw;
      }
  
      .intro-subheadline {
        font-size: 2vw;
        animation: fadeInText 1s 3s ease-in-out forwards;
        color: #ff4539;
        z-index: 1;
        opacity: 0;
        margin-bottom: 0;
        font-weight: 400;
        margin-top: 2vw;
        display: block;
      }

      @media only screen and (max-width: 350px) {
        .intro-headline {
          font-size: 13.5vw !important;
        }

        .intro-headline-2 {
          margin-top: 13.5vw;
        }

        .intro-subheadline {
          font-size: 7.5vw;
          margin-top: 4vw;
        }

        .intro-mobile-line-break {
          display: inline;
        }

        .intro-text-container {
          animation: moveuptextmobile 2s 1s cubic-bezier(0.94, 0.01, 0.1, 1.06) forwards;
        }
      }

      @media only screen and (min-width: 351px) and (max-width: 550px) {
        .intro-headline {
          font-size: 10vw !important;
        }

        .intro-headline-2 {
          margin-top: 10vw;
        }

        .intro-subheadline {
          font-size: 5vw;
          margin-top: 4vw;
        }

        .intro-mobile-line-break {
          display: inline;
        }

        .intro-text-container {
          animation: moveuptextmobile 2s 1s cubic-bezier(0.94, 0.01, 0.1, 1.06) forwards;
        }
      }

      @media only screen and (min-width: 551px) and (max-width: 950px) {
        .intro-headline {
          font-size: 7.5vw !important;
        }

        .intro-headline-2 {
          margin-top: 7.5vw;
        }

        .intro-subheadline {
          font-size: 4.5vw;
          margin-top: 4vw;
        }
      }
      
      @media only screen and (min-width: 951px) and (max-width: 1350px) {
        .intro-headline {
          font-size: 5.5vw !important;
        }

        .intro-headline-2 {
          margin-top: 5.5vw;
        }

        .intro-subheadline {
          font-size: 3.5vw;
          margin-top: 2vw;
        }
      }
  
      .intro-animation-container {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        background-color: #ff4539;
        flex-direction: column;
        position: relative;
        font-family: 'Muli';
      }
  
      .intro-white-wall {
        background-color: #f4f4f4;
        position: absolute;
        bottom: 0px;
        left: 0;
        height: 0px;
        width: 100%;
        animation: moveupwall 2s 1s cubic-bezier(0.94, 0.01, 0.1, 1.06) forwards;
      }
  
      @keyframes moveupwall {
        from {
          height: 0%;
        }
  
        to {
          height: 100%;
        }
      }
  
      @keyframes moveuptext {
        from {
          margin-bottom: 0px;
        }
        to {
          margin-bottom: 150px;
        }
      }
      
      @keyframes moveuptextmobile {
        from {
          margin-bottom: 0px;
        }
        to {
          margin-bottom: 70px;
        }
      }
  
      @keyframes colorchange {
        0% {
          color: #f4f4f4;
        }
        50% {
          color: #f4f4f4;
        }
        51% {
          color: #ff4539;
        }
        100% {
          color: #ff4539;
        }
      }
  
      @keyframes fadeInText {
        from {
          opacity: 0;
        }
        to {
          opacity: 1;
        }
      }
    </style>


<?php /* 
	<script type="text/javascript">

		jQuery(document).ready(function() {

			var breakpoint = 1024;

			loadVideo();

			// Pause when page is not in the foreground
			"stern"/
			jQuery(window).blur(function() {
				jQuery('#herovideo')[0].pause();
			});
			"stern"/

			// Play when page returns to the foreground
			"stern"/
			jQuery(window).focus(function() {
				if (jQuery(document).width() > breakpoint) {
					jQuery('#herovideo')[0].play();
				}
			});
			"stern"/

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

				// Rewrite existing source tags for mobile
				if (jQuery(document).width() < breakpoint + 1) {
					if (document.querySelectorAll("#herovideo > source").length < 1) {
						var source1 = document.createElement('source');

						source1.setAttribute('src', 'https://creativconcept.de/wp-content/themes/creativconcept/video/Creativconcept_Imagefilm_Shortversion_Mobile.mp4');
						source1.setAttribute('type', 'video/mp4');

						video.appendChild(source1);
					}
				}

				// Add source tags if not already present
				if (jQuery(document).width() > breakpoint) {
					if (document.querySelectorAll("#herovideo > source").length < 1) {
						var source1 = document.createElement('source');

						source1.setAttribute('src', 'https://creativconcept.de/wp-content/themes/creativconcept/video/Creativconcept_Imagefilm_22.mp4');
						source1.setAttribute('type', 'video/mp4');

						video.appendChild(source1);
					}

					// Play the video
					jQuery('#herovideo')[0].play();
				}
			}
		});
	</script>


 */ ?>