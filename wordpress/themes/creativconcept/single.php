<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package creativconcept
 */

get_header();
?>

	<main id="primary" class="site-main container">

		<?php
			$current_post = get_the_ID();
			$taxonomy = wp_get_post_terms(get_the_ID(), 'kunden');
			$taxonomy_name = $taxonomy[0]->name;
			$taxonomy_description = $taxonomy[0]->description;
			$taxonomy_id = $taxonomy[0]->term_id;
			$taxonomy_term = get_term($taxonomy_id, 'kunden');
			$subheadline = get_field('subheadline', $taxonomy_term);
			$loopcount = 0;
		?>

		<header class="page-header">
			<h1><?php echo $taxonomy_name; ?></h1>
			<h3><?php echo $subheadline; ?></h3>

			<div id="description_anchors">
				<div id="description">
					<p><?php echo $taxonomy_description; ?></p>
				</div> <!-- #description -->

				<?php
					$args_related = array(
						'post_type' => 'arbeiten',
						'tax_query' => array(
							array(
							'taxonomy' => 'kunden',
							'field' => 'term_id',
							'terms' => $taxonomy_id
							)
						)
					);
					$query_related = new WP_Query( $args_related );
				?>

				<div id="anchors">
					<div class="anchor_column">
						<?php
							while ($query_related->have_posts()) : $query_related->the_post();
								$slug = get_post_field( 'post_name', get_the_ID() );

								if ($loopcount < 4) { ?>

									<a href="#<?php echo $slug; ?>" class="anchor">
										<?php echo get_the_excerpt(); ?>
									</a> <!-- .anchor -->

								<?php } else if ( $loopcount == 4 ) { ?>

									</div>
									<div class="anchor_column">
										<a href="#<?php echo $slug; ?>" class="anchor">
											<?php echo get_the_excerpt(); ?>
										</a> <!-- .anchor -->

								<?php } else { ?>
									<a href="#<?php echo $slug; ?>" class="anchor">
										<?php echo get_the_excerpt(); ?>
									</a> <!-- .anchor -->
								<?php }
								
								$loopcount++;

							endwhile; wp_reset_postdata();
						?>
					</div> <!-- .anchor_column -->
				</div> <!-- #anchors -->
			</div> <!-- #description_anchor -->
		</header><!-- .page-header -->

		<?php
		while ( have_posts() ) :
			the_post();

			$slug = get_post_field( 'post_name', get_the_ID() ); ?>

			<div id="<?php echo $slug; ?>" class="work">
				<?php the_content(); ?>
				<p></p>
			</div> <!-- .work -->

		<?php endwhile; wp_reset_postdata(); // End of the loop.
		?>

		<?php
			$args_related_nocurrent = array(
				'post_type' => 'arbeiten',
				'post__not_in' => array($current_post),
				'tax_query' => array(
					array(
					'taxonomy' => 'kunden',
					'field' => 'term_id',
					'terms' => $taxonomy_id
					)
				)
			);
			$query_related_nocurrent = new WP_Query( $args_related_nocurrent );
		?>

		<?php
		while ($query_related_nocurrent->have_posts()) : $query_related_nocurrent->the_post();

			$slug = get_post_field( 'post_name', get_the_ID() ); ?>

			<div id="<?php echo $slug; ?>" class="work">
				<?php the_content(); ?>
				<p></p>
			</div> <!-- .work -->

		<?php endwhile; wp_reset_postdata(); // End of the loop.
		?>

		<div id="post_navigation">
			<div><?php next_post_link( '%link', '‹  Zurück' ); ?></div>
			<div><a href="<?php echo get_home_url().'/arbeiten/'; ?>">Übersicht</a></div>
			<div><?php previous_post_link( '%link', 'Weiter  ›' ); ?></div>
		</div>

		<div id="bottom_links">
			<a href="<?php echo get_home_url().'/agentur/'; ?>">Agentur ›</a>
			<a href="<?php echo get_home_url().'/referenzen/'; ?>">Referenzen ›</a>
		</div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
