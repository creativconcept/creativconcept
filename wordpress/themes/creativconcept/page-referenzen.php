<?php
/**
 * Template Name: Referenzen
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

			<?php if (!is_front_page()) {

				$subheadline = get_field('page_subheadline', $post->ID);
				$beschreibung = get_field('page_beschreibung', $post->ID);
				?>

				<header class="page-header">
					<h1><?php echo get_the_title(); ?></h1>
					<h3><?php echo $subheadline; ?></h3>
				</header>

				<div id="description_anchors">
						<div id="description">
							<?php echo "<p>".$beschreibung."</p>"; ?>
						</div> <!-- #description -->
						<div id="anchors">
						</div> <!-- #anchors -->
					</div> <!-- #description_anchor -->
				</header><!-- .page-header -->

			<?php } else {
				echo '<div class="spacer"></div>';
			} ?>

			<div id="referenzen">
				<div>
					<p>
						<?php /* HERSTELLER */ ?>
						<?php $hersteller_name = get_term_by('id', 22, 'branchen')->name; ?>
						<strong><?php echo $hersteller_name; ?></strong>
						<br>

						<?php
							$hersteller_args = array(
								'hide_empty' => false,
								'meta_query' => array(
									array(
									'key'       => 'branchenauswahl',
									'value'     => 22,
									'compare'   => '='
									)
								),
								'taxonomy'  => 'kunden',
								);
							$hersteller_terms = get_terms( $hersteller_args );

							foreach ($hersteller_terms as $hersteller) {
								if ($hersteller->count == 0) {
									echo $hersteller->name."<br>";
								} else {
									echo '<a href="'.get_term_link( $hersteller->term_id, 'kunden' ).'">'.$hersteller->name.'</a><br>';
								}
							}
							echo "<br>";
						?>

						<?php /* DIENSTLEISTUNGEN */ ?>
						<?php $dienstleistungen_name = get_term_by('id', 20, 'branchen')->name; ?>
						<strong><?php echo $dienstleistungen_name; ?></strong>
						<br>

						<?php
							$dienstleistungen_args = array(
								'hide_empty' => false,
								'meta_query' => array(
									array(
									'key'       => 'branchenauswahl',
									'value'     => 20,
									'compare'   => '='
									)
								),
								'taxonomy'  => 'kunden',
								);
							$dienstleistungen_terms = get_terms( $dienstleistungen_args );

							foreach ($dienstleistungen_terms as $dienstleistungen) {
								if ($dienstleistungen->count == 0) {
									echo $dienstleistungen->name."<br>";
								} else {
									echo '<a href="'.get_term_link( $dienstleistungen->term_id, 'kunden' ).'">'.$dienstleistungen->name.'</a><br>';
								}
							}
						?>
					</p>
				</div>
				<div>
					<p>
						<?php /* HANDEL */ ?>
						<?php $handel_name = get_term_by('id', 21, 'branchen')->name; ?>
						<strong><?php echo $handel_name; ?></strong>
						<br>

						<?php
							$handel_args = array(
								'hide_empty' => false,
								'meta_query' => array(
									array(
									'key'       => 'branchenauswahl',
									'value'     => 21,
									'compare'   => '='
									)
								),
								'taxonomy'  => 'kunden',
								);
							$handel_terms = get_terms( $handel_args );

							foreach ($handel_terms as $handel) {
								if ($handel->count == 0) {
									echo $handel->name."<br>";
								} else {
									echo '<a href="'.get_term_link( $handel->term_id, 'kunden' ).'">'.$handel->name.'</a><br>';
								}
							}
							echo "<br>";
						?>

						<?php /* STADT */ ?>
						<?php $stadt_name = get_term_by('id', 27, 'branchen')->name; ?>
						<strong><?php echo $stadt_name; ?></strong>
						<br>

						<?php
							$stadt_args = array(
								'hide_empty' => false,
								'meta_query' => array(
									array(
									'key'       => 'branchenauswahl',
									'value'     => 27,
									'compare'   => '='
									)
								),
								'taxonomy'  => 'kunden',
								);
							$stadt_terms = get_terms( $stadt_args );

							foreach ($stadt_terms as $stadt) {
								if ($stadt->count == 0) {
									echo $stadt->name."<br>";
								} else {
									echo '<a href="'.get_term_link( $stadt->term_id, 'kunden' ).'">'.$stadt->name.'</a><br>';
								}
							}
							echo "<br>";
						?>

						<?php /* MEDIZIN */ ?>
						<?php $medizin_name = get_term_by('id', 25, 'branchen')->name; ?>
						<strong><?php echo $medizin_name; ?></strong>
						<br>

						<?php
							$medizin_args = array(
								'hide_empty' => false,
								'meta_query' => array(
									array(
									'key'       => 'branchenauswahl',
									'value'     => 25,
									'compare'   => '='
									)
								),
								'taxonomy'  => 'kunden',
								);
							$medizin_terms = get_terms( $medizin_args );

							foreach ($medizin_terms as $medizin) {
								if ($medizin->count == 0) {
									echo $medizin->name."<br>";
								} else {
									echo '<a href="'.get_term_link( $medizin->term_id, 'kunden' ).'">'.$medizin->name.'</a><br>';
								}
							}
						?>
					</p>
				</div>
				<div>
					<p>
						<?php /* BAU */ ?>
						<?php $bau_name = get_term_by('id', 19, 'branchen')->name; ?>
						<strong><?php echo $bau_name; ?></strong>
						<br>

						<?php
							$bau_args = array(
								'hide_empty' => false,
								'meta_query' => array(
									array(
									'key'       => 'branchenauswahl',
									'value'     => 19,
									'compare'   => '='
									)
								),
								'taxonomy'  => 'kunden',
								);
							$bau_terms = get_terms( $bau_args );

							foreach ($bau_terms as $bau) {
								if ($bau->count == 0) {
									echo $bau->name."<br>";
								} else {
									echo '<a href="'.get_term_link( $bau->term_id, 'kunden' ).'">'.$bau->name.'</a><br>';
								}
							}
							echo "<br>";
						?>

						<?php /* MEDIEN */ ?>
						<?php $medien_name = get_term_by('id', 24, 'branchen')->name; ?>
						<strong><?php echo $medien_name; ?></strong>
						<br>

						<?php
							$medien_args = array(
								'hide_empty' => false,
								'meta_query' => array(
									array(
									'key'       => 'branchenauswahl',
									'value'     => 24,
									'compare'   => '='
									)
								),
								'taxonomy'  => 'kunden',
								);
							$medien_terms = get_terms( $medien_args );

							foreach ($medien_terms as $medien) {
								if ($medien->count == 0) {
									echo $medien->name."<br>";
								} else {
									echo '<a href="'.get_term_link( $medien->term_id, 'kunden' ).'">'.$medien->name.'</a><br>';
								}
							}
							echo "<br>";
						?>

						<?php /* SCHULE */ ?>
						<?php $schule_name = get_term_by('id', 26, 'branchen')->name; ?>
						<strong><?php echo $schule_name; ?></strong>
						<br>

						<?php
							$schule_args = array(
								'hide_empty' => false,
								'meta_query' => array(
									array(
									'key'       => 'branchenauswahl',
									'value'     => 26,
									'compare'   => '='
									)
								),
								'taxonomy'  => 'kunden',
								);
							$schule_terms = get_terms( $schule_args );

							foreach ($schule_terms as $schule) {
								if ($schule->count == 0) {
									echo $schule->name."<br>";
								} else {
									echo '<a href="'.get_term_link( $schule->term_id, 'kunden' ).'">'.$schule->name.'</a><br>';
								}
							}
							echo "<br>";
						?>

						<?php /* Soziales Engagement */ ?>
						<strong>Soziales Engagement</strong>
						<br>
						<a href="<?php echo get_home_url(); ?>/arbeiten/soziales-engagement/deckel-drauf/">Deckel drauf!</a><br>
						<a href="<?php echo get_home_url(); ?>/arbeiten/soziales-engagement/marketing-club-regensburg/">Marketing Club Regensburg</a><br>
						<a href="<?php echo get_home_url(); ?>/arbeiten/soziales-engagement/das-don-bosco-projekt/">Das Don Bosco Projekt</a><br>
						<a href="<?php echo get_home_url(); ?>/arbeiten/soziales-engagement/rotary-adventskalender/">Rotary Adventskalender</a><br>

						<?php /* KUNST 
						<?php $kunst_name = get_term_by('id', 23, 'branchen')->name; ?>
						<strong><?php echo $kunst_name; ?></strong>
						<br>

						<?php
							$kunst_args = array(
								'hide_empty' => false,
								'meta_query' => array(
									array(
									'key'       => 'branchenauswahl',
									'value'     => 23,
									'compare'   => '='
									)
								),
								'taxonomy'  => 'kunden',
								);
							$kunst_terms = get_terms( $kunst_args );

							foreach ($kunst_terms as $kunst) {
								if ($kunst->count == 0) {
									echo $kunst->name."<br>";
								} else {
									echo '<a href="'.get_term_link( $kunst->term_id, 'kunden' ).'">'.$kunst->name.'</a><br>';
								}
							} */
						?>
					</p>
				</div>
			</div> <!-- #referenzen -->


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
