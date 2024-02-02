<?php
/**
 * The template for displaying taxonomy pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creativconcept
 */

get_header();
?>

	<main id="primary" class="site-main container">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1><?php single_cat_title(); ?></h1>

				<?php
					// get the current taxonomy term
					$term = get_queried_object();
					// vars
					$subheadline = get_field('subheadline', $term);
				?>
				<h3><?php echo $subheadline; ?></h3>

				<div id="description_anchors">
					<div id="description">
						<?php echo the_archive_description(); ?>
					</div> <!-- #description -->
					<div id="anchors">
						<div class="anchor_column">
							<?php
								/* Start the Loop */
								$loopcount = 0;
								while ( have_posts() ) :
									the_post();

									$slug = get_post_field( 'post_name', get_the_ID() );

									if ($loopcount < 4) { ?>

										<a href="#<?php echo $slug; ?>" class="anchor">
											<?php echo get_the_excerpt(); ?>
										</a> <!-- .anchor -->

										<?php 
									} else if ( $loopcount == 4 ) { ?>

										</div>
										<div class="anchor_column">
											<a href="#<?php echo $slug; ?>" class="anchor">
												<?php echo get_the_excerpt(); ?>
											</a> <!-- .anchor -->
										
										<?php 
									} else { ?>
										<a href="#<?php echo $slug; ?>" class="anchor">
											<?php echo get_the_excerpt(); ?>
										</a> <!-- .anchor -->
									<?php }
									
									$loopcount++; ?>

								<?php endwhile; wp_reset_query();
							?>
							</div> <!-- .anchor_column -->
					</div> <!-- #anchors -->
				</div> <!-- #description_anchor -->
			</header><!-- .page-header -->

			<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					$slug = get_post_field( 'post_name', get_the_ID() ); ?>

					<div id="<?php echo $slug; ?>" class="work">
						<?php the_content(); ?>
						<p></p>
					</div> <!-- .work -->

				<?php endwhile; wp_reset_query();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
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
