<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creativconcept
 */

get_header();
?>

	<main id="primary" class="site-main container">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<?php

				$subheadline = get_field('page_subheadline', $post->ID);
				$beschreibung = get_field('page_beschreibung', $post->ID);

			?>

			<header class="page-header">

			<?php  if (!is_front_page()) { ?>
				<h1><?php echo get_the_title(); ?></h1>
			<?php } else { ?>
				<h1>Creativ Concept</h1>
			<?php } ?>
				<h3><?php echo $subheadline; ?></h3>
			</header>

			<div id="description_anchors">
				<div id="description">
					<?php echo "<p>".$beschreibung."</p>"; ?>
				</div> <!-- #description -->
				<div id="anchors">
				</div> <!-- #anchors -->
			</div> <!-- #description_anchor -->

			<?php echo the_content(); ?>


		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
