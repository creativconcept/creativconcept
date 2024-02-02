<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creativconcept
 */

?>

	<footer id="footer" class="site-footer container">
		<div>
			<h2><?php echo get_the_title(1155); ?></h2>
			<?php echo get_post_field('post_content', 1155); ?>
		</div>
		<div>
			<ul class="footer_navigation">
				<li><a href="<?php echo get_home_url(); ?>/agentur">Agentur</a></li>
				<li><a href="<?php echo get_home_url(); ?>/arbeiten">Portfolio</a></li>
				<li><a href="<?php echo get_home_url(); ?>/leistungen">Leistungen</a></li>
				<li><a href="<?php echo get_home_url(); ?>/referenzen">Referenzen</a></li>
			</ul>
			<div class="contact_info">
				<?php echo get_post_field('post_content', 1157, false); ?>
			</div>
		</div>
		<div>
			<a href="<?php echo get_home_url(); ?>">
				<img src="https://creativconcept.de/wp-content/uploads/2021/12/CC_Logo_footer.svg" alt="creativconcept werbeagentur">
			</a>
		</div>
	</footer><!-- #footer -->
</div><!-- #page -->

<a id="backtotop"></a>

<script>
	/* Mobile Menu */

	function menuToggle(x) {
		x.classList.toggle("change");
		var menu = document.getElementById("menu");
		menu.classList.toggle("activeMenu");
	}
</script>

<script>
	/* Fly in elements on scroll */
	(function(jQuery) {

		jQuery.fn.visible = function(partial) {
			
			var $t            = jQuery(this),
				$w            = jQuery(window),
				viewTop       = $w.scrollTop(),
				viewBottom    = viewTop + $w.height(),
				_top          = $t.offset().top,
				_bottom       = _top + $t.height(),
				compareTop    = partial === true ? _bottom : _top,
				compareBottom = partial === true ? _top : _bottom;
			
			return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

		};
			
		})(jQuery);

		var win = jQuery(window);

		var allMods = jQuery("#primary .wp-block-image, #primary .wp-block-group, #primary .wp-block-column, #primary p, #primary h2, #primary .wp-block-group");

		allMods.each(function(i, el) {
		var el = jQuery(el);
		if (el.visible(true)) {
			el.addClass("already-visible"); 
		} 
		});

		win.scroll(function(event) {
		
		allMods.each(function(i, el) {
			var el = jQuery(el);
			if (el.visible(true)) {
			el.addClass("come-in"); 
			} 
		});
		
	});

</script>

<script>
	/* Back to Top */

	var btn = jQuery('#backtotop');

	jQuery(window).scroll(function() {
	if (jQuery(window).scrollTop() > 300) {
		btn.addClass('show');
	} else {
		btn.removeClass('show');
	}
	});

	btn.on('click', function(e) {
	e.preventDefault();
	jQuery('html, body').animate({scrollTop:0}, '300');
	});

</script>

<?php wp_footer(); ?>

</body>
</html>
