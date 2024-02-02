<?php
/**
 * Template Name: Links
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creativconcept
 */

 get_header();
?>

	<main id="primary" class="site-main container">

		<div id="links-container">
			<div id="logo">
				<a href="<?php echo get_home_url(); ?>">
					<img src="<?php echo get_template_directory_uri();?>/images/logo_creativconcept.svg">
				</a>
			</div> <!-- #logo -->
			<?php echo the_content(); ?>
		</div><!-- #links-container -->

	</main><!-- #main -->

	<style>
		body {
			background-color: var(--color-orange);
		}

		header {
			display: none !important;
		}

		#links-container {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}

		#links-container #logo {
			filter: invert(0%) sepia(1%) saturate(1%) hue-rotate(295deg) brightness(1000%) contrast(100%);
		}
		
		#links-container ul {
			list-style-type: none;
		}

		#links-container ul a  {
			display: inline-block;
			border: 1px solid white;
			padding: 1.4rem 2.5rem;
			margin: 0.25rem;
			background: linear-gradient(to right, white 50%, var(--color-orange) 50%);
			background-size: 200% 100%;
			background-position: right bottom;
			-webkit-transition: all .3s ease-out;
			transition: all .3s ease-out;
			text-decoration: none;
			width: 500px;
			max-width: 64vw;
			color: white;
			text-align: center;
			font-size: 20px;
			text-transform: uppercase;
		}

		@media (min-width: 500px) {
			#links-container ul a:hover  {
				background-position: left bottom;
				color: var(--color-orange);
			}	
		}


	</style>

