<?php
/**
 * The template for displaying search forms in template
 *
 * @package template
 * @since template 1.0
 */
?>
    <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
        <label for="s" class="assistive-text"><?php _e( 'Search', 'template' ); ?></label>
        <input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'template' ); ?>" />
        <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'template' ); ?>" />
    </form>