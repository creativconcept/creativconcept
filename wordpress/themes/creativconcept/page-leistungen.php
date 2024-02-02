<?php
/**
 * Template Name: Leistungen
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
				<div id="description" class="leistungen_description">
					<?php echo "<p>".$beschreibung."</p>"; ?>
				</div> <!-- #description -->
				<div id="anchors" class="leistungen_anchors">
					<div class="anchor_column">
						<?php
							$loopcount = 0;
							if( have_rows('page_ankernavigation') ):

								while ( have_rows('page_ankernavigation') ) : the_row();

									$element_id = get_sub_field('page_element_id');
									$element_name = get_sub_field('page_beschriftung');

									if ($loopcount < 5) { ?>

										<a href="<?php echo get_permalink();?>#<?php echo $element_id; ?>" class="anchor">
											<?php echo $element_name; ?>
										</a> <!-- .anchor -->

									<?php } else if ( $loopcount == 5 ) { ?>

										</div>
										<div class="anchor_column">
										<a href="<?php echo get_permalink();?>#<?php echo $element_id; ?>" class="anchor">
											<?php echo $element_name; ?>
										</a> <!-- .anchor -->

									<?php } else if ( $loopcount == 10 ) { ?>

										</div>
										<div class="anchor_column">
										<a href="<?php echo get_permalink();?>#<?php echo $element_id; ?>" class="anchor">
											<?php echo $element_name; ?>
										</a> <!-- .anchor -->

									<?php } else { ?>
										<a href="<?php echo get_permalink();?>#<?php echo $element_id; ?>" class="anchor">
											<?php echo $element_name; ?>
										</a> <!-- .anchor -->
									<?php }
									
									$loopcount++;

								endwhile;

							else :

								// no rows found

							endif;
						?>
					</div> <!-- .anchor_column -->
				</div> <!-- #anchors -->
			</div> <!-- #description_anchor -->

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

		<div id="bottom_links">
			<?php if(!empty($beschriftung_button)): ?>
				<a <?php if(empty($beschriftung_button_two)) echo 'style="width:100%;"'; ?> href="<?php echo $link_button ?: '#'; ?>"><?php echo $beschriftung_button ?: '#'; ?></a>
			<?php endif; ?>
			<?php if(!empty($beschriftung_button_two)): ?>
				<a href="<?php echo $link_button_two ?: '#'; ?>"><?php echo $beschriftung_button_two ?: '#'; ?></a>
			<?php endif; ?>
		</div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
