<?php
/**
 * Template Name: Startseite
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creativconcept
 */

get_header('startseite');
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
				<h1><?php echo "Creativ Concept"; ?></h1>
				<h3><?php echo $subheadline; ?></h3>
				<div id="description">
					<?php echo "<p>".$beschreibung."</p>"; ?>
				</div> <!-- #description -->
			</header>

			<?php echo the_content(); ?>


		<?php endwhile; // End of the loop.
		?>

		<?php
			if( have_rows('page_buttons') ):
				while( have_rows('page_buttons') ): the_row();
					$beschriftung_button = get_sub_field('1_beschriftung');
					$link_button = get_sub_field('1_link');
					$beschriftung_button_two = get_sub_field('2_beschriftung');
					$link_button_two = get_sub_field('2_link');
				endwhile;
    		endif;
		?>

		<?php if(!empty($beschriftung_button)) { ?>
			<div id="bottom_links">
				<a href="<?php echo $link_button; ?>"><?php echo $beschriftung_button; ?></a>
				<a href="<?php echo $link_button_two; ?>"><?php echo $beschriftung_button_two; ?></a>
			</div>
		<?php } ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();