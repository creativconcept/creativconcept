<?php

/**
 * Plugin Name:       creativconcept | Blocks
 * Description:       Wiederverwendbare Blöcke für den Gutenberg-Editor
 * Version:           1.0.0
 * Author:            Creativ Concept Werbeagentur GmbH
 * Author URI:        https://www.creativconcept.de
 * Text Domain:       creativconcept
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

/**
 * Currently plugin version.
 */
define( 'CREATIVCONCEPT_BLOCKS_VERSION', '1.0.0' );

class CcComponents {
    // Methods
    function headline( $value = null ) {
        ob_start();
        require( 'components/headline.php' );
        return ob_get_clean();
    }
    function subheadline( $value = null ) {
        ob_start();
        require( 'components/subheadline.php' );
        return ob_get_clean();
    }
    function sectionheading( $value = null ) {
        ob_start();
        require( 'components/section-heading.php' );
        return ob_get_clean();
    }
    function paragraph( $value = null ) {
        ob_start();
        require( 'components/paragraph.php' );
        return ob_get_clean();
    }
    function button( $value = null, $link = null ) {
        ob_start();
        require( 'components/button.php' );
        return ob_get_clean();
    }
}


/**************************************************************************
 * CREATE CATEGORIES FOR GUTENBERG BLOCKS *********************************
**************************************************************************/


add_filter( 'block_categories_all', 'creativconcept_block_category', 10, 2);
function creativconcept_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		[
			[
				'slug' => 'medien',
				'title' => __( 'Medien', 'creativconcept' )
			]
		],
	);
}



/**************************************************************************
 * CREATE GUTENBERG BLOCKS ************************************************
**************************************************************************/


add_action('acf/init', 'creativconcept_acf_blocks');
function creativconcept_acf_blocks() {
    
    if( function_exists('acf_register_block_type') ) {

		$allowed_post_types = array('page','post','arbeiten');

        // Components

		acf_register_block_type(array(
            'name'              => 'comp_headline',
            'title'             => __('Component: Headline', 'creativconcept'),
        ));

		acf_register_block_type(array(
            'name'              => 'comp_subheadline',
            'title'             => __('Component: Subheadline', 'creativconcept'),
        ));

		acf_register_block_type(array(
            'name'              => 'comp_sectionheading',
            'title'             => __('Component: Section Heading', 'creativconcept'),
        ));

		acf_register_block_type(array(
            'name'              => 'comp_paragraph',
            'title'             => __('Component: Paragraph', 'creativconcept'),
        ));

		acf_register_block_type(array(
            'name'              => 'comp_button',
            'title'             => __('Component: Button', 'creativconcept'),
        ));

		acf_register_block_type(array(
            'name'              => 'intro',
            'title'             => __('Intro'),
			'post_types' => $allowed_post_types,
            'render_template' => '../../plugins/creativconcept-blocks/blocks/intro/intro.php',
			'enqueue_style' => get_template_directory_uri() . '/style.css',
            'category'          => 'text',
            'icon'              => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>',
			'example'  => array(
				'attributes' => array(
					'mode' => 'preview'
				)
			)
        ));

		acf_register_block_type(array(
            'name'              => 'pagenavi',
            'title'             => __('Inhalts-Navigation'),
			'post_types' => $allowed_post_types,
            'render_template' => '../../plugins/creativconcept-blocks/blocks/pagenavi/pagenavi.php',
			'enqueue_style' => get_template_directory_uri() . '/style.css',
            'category'          => 'text',
            'icon'              => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>',
			'example'  => array(
				'attributes' => array(
					'mode' => 'preview'
				)
			)
        ));

		acf_register_block_type(array(
            'name'              => 'imageslider',
            'title'             => __('Bilder-Slider'),
			'post_types' => $allowed_post_types,
            'render_template' => '../../plugins/creativconcept-blocks/blocks/imageslider/imageslider.php',
			'enqueue_style' => get_template_directory_uri() . '/style.css',
            'category'          => 'text',
            'icon'              => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>',
			'example'  => array(
				'attributes' => array(
					'mode' => 'preview'
				)
			)
        ));

        acf_register_block_type(array(
            'name'              => 'text-text',
            'title'             => __('Text|Text'),
			'post_types' => $allowed_post_types,
            'render_template' => '../../plugins/creativconcept-blocks/blocks/text-text/text-text.php',
			'enqueue_style' => get_template_directory_uri() . '/style.css',
            'category'          => 'text',
            'icon'              => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>',
			'example'  => array(
				'attributes' => array(
					'mode' => 'preview'
				)
			)
        ));

    }

}

/**************************************************************************
 * ONLY ALLOW THE LISTED BLOCK TYPES **************************************
**************************************************************************/

// function creativconcept_allowed_block_types( $allowed_blocks ) {
 
// 	return array(
// 		// Text
// 		'acf/text'
// 	);
 
// }
// add_filter( 'allowed_block_types_all', 'creativconcept_allowed_block_types' );

  