<?php
/**
 * Template Name: Blog
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package template
 * @since template 1.0
 */
 
get_header(); ?>

		<div id="space-line"><!--space--></div>
		<?php custom_breadcrumbs(); ?>
 
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">

                <div class="blogposts_container">
                		<?php $args = array( 'posts_per_page' => 15, 'post_type' => blogposts, 'orderby' => date );
                		$myposts = get_posts( $args );
                		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                				<?php if (has_post_thumbnail( $post->ID ) ): ?>
                					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                					
                						<div class="blogposts_box">
                							<div class="blogposts_image">
                								<a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"></a>
                							</div>
                							<div class="blogposts_content">
                								<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                								<h2>Veröffentlicht am <?php the_date(); ?></h2>
                								<p><?php the_content(); ?></p>
                								<p><?php echo do_shortcode( '[shariff]' );?></p>
                							</div>
                							<div style="clear:both"></div>
                							<hr />
                						</div>
                					
                				<?php endif; ?>
                		<?php endforeach; ?>
                		<div style="clear:both;"> <!-- clear --> </div>
                		<?php wp_reset_postdata();?>
                </div>
 
 			<?php while ( have_posts() ) : the_post(); ?>
 			
 			                   <?php get_template_part( 'content', 'page' ); ?>
 			
 			                   <?php comments_template( '', true ); ?>
 			
 			<?php endwhile; // end of the loop. ?>
 
            </div><!-- #content .site-content -->
        </div><!-- #primary .content-area -->
 
<?php get_footer(); ?>