<?php

/*
	Plugin Name: Creativ Concept | REST-Route
	Description: Anlegen individueller Routen für die Optimierung der Performance
	Author: Martin Rank | Creativ Concept Werbeagentur GmbH
	Version: 0.1
*/

if ( ! defined( 'ABSPATH' ) ) exit;


/**************************************************************************
 * Register rest route  **************************************
**************************************************************************/

/***********************************
 * Register REST-Route
***********************************/

add_action('rest_api_init', function () {
    register_rest_route( 'creativconcept/v1', '/arbeiten/(?P<order>[a-zA-Z0-9-]+)',array(
        'methods'  => 'GET',
        'callback' => 'get_cc_arbeiten',
        'permission_callback' => '__return_true'
    ));
});

function get_cc_arbeiten($request) {

	//$order = $request['order'];
	//$order = strval($order);

    $args = array(
        'post_type' => 'arbeiten',
        'numberposts' => -1
		//'meta_key' => 'ref_name',
        //'orderby' => 'meta_value',
		//'order' => $order
    );

    $arbeiten = get_posts($args);
    if (empty($arbeiten)) {
        return new WP_Error( 'empty_category', 'There are no posts to display', array('status' => 404) );
    }

    $results = array();

    foreach ( $arbeiten as $arbeit ) {

        // Post ID
        $post_id = $arbeit->ID;
        $arbeit_kunde = wp_get_post_terms($post_id, 'kunden', array('fields'=>'names'));
        $arbeit_kunde = $arbeit_kunde[0];
        $arbeit_leistung = wp_get_post_terms($post_id, 'leistung', array('fields'=>'ids'));
        $arbeit_branchen = wp_get_post_terms($post_id, 'branchen', array('fields'=>'ids'));
        $arbeit_name = get_the_title($post_id);
        $arbeit_image = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'large');
        $arbeit_image = $arbeit_image[0];
        $arbeit_link = get_the_permalink($post_id);

        array_push( $results, array(
            'id' => $post_id,
			'name' => $arbeit_name,
            'link' => $arbeit_link,
            'image' => $arbeit_image,
            'kunde' => $arbeit_kunde,
            'leistung' => $arbeit_leistung,
            'branchen' => $arbeit_branchen
        ) );
     }

    $response = new WP_REST_Response($results);
    $response->set_status(200);

    return $response;
}
