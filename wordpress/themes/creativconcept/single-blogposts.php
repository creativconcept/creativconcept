<?php
/**
 * The Template for displaying all single posts.
 *
 * @package template
 * @since template 1.0
 */
 
get_header(); ?>
		<div class="breadcrumbs2">
			<div class="post_navigation_breadcrumbs">
				<?php
				    echo "<a href='";?> <?php echo get_page_link(2); ?> <?php echo"' title='Startseite'>Startseite</a>&nbsp;&nbsp;//&nbsp;&nbsp;";
					echo "<a href='";?> <?php echo get_page_link(2042); ?> <?php echo"' title='News'>News</a>&nbsp;&nbsp;//&nbsp;&nbsp;";
				    echo "<span>";?> <?php echo get_the_title( $ID ); ?> <?php echo"</span>";
				?>
			</div>
		</div>
		<div style="clear:both"></div>
		<hr>
		<div id="space-line"><!--space--></div>
 
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
 
	            <?php while ( have_posts() ) : the_post(); ?>
	 
	                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                					
					<div class="blogposts_box">
						<div class="blogposts_image">
							<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
						</div>
						<div class="blogposts_content">
							<h1><?php the_title(); ?></h1>
							<h2>Veröffentlicht am <?php the_date(); ?></h2>
							<p><?php the_content(); ?></p>
						</div>
						<div style="clear:both"></div>
						<hr />
					</div>
	 
	            <?php endwhile; // end of the loop. ?>
	            
	            <div id="ref_navi_bottom">
	            	<div class="post_navigation_right"><?php previous_post_link( '%link', 'Nächster', TRUE ); ?></div>
	            	<div class="post_navigation_left"><?php next_post_link( '%link', 'Vorheriger', TRUE ); ?></div>
	            </div>
	            
	            <div class="space_height"><!--Spacer--></div>
 
            </div><!-- #content .site-content -->
            
        </div><!-- #primary .content-area -->
    
 
<?php get_footer(); ?>