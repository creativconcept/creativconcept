<?php
/*
* Plugin Name: CC Shortcode für Image Carousel
* Description: Plugin für die durchlaufenden Bilder
* Version: 1.0
* Author: Creativ Concept Werbeagentur GmbH
* Author URI: https://www.creativconcept.de
*/

function cc_image_carousel(){ ?>

	<section id="imagecarousel">
		<article>
			<?php
				for ($counter = 0; $counter <= 4; $counter++) { ?>
					<div>
						<ul>
							<li><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/1.jpg'; ?>" /></li>
							<li><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/2.jpg'; ?>" /></li>
							<li><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/3.jpg'; ?>" /></li>
							<li><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/4.jpg'; ?>" /></li>
							<li><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/5.jpg'; ?>" /></li>
							<li><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/6.jpg'; ?>" /></li>
							<li><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/7.jpg'; ?>" /></li>
							<li><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/8.jpg'; ?>" /></li>
						</ul>
					</div>
				<?php } ?>
		</article>
	</section>

<?php }
if(!is_admin()) {
	add_shortcode('imagecarousel', 'cc_image_carousel');
}

?>