<?php
/**
 * Plugin Name: Wordpress Optimization
 * Plugin URI: https://github.com/BesrourMS/WordPress-Optimization
 * Description: Optimize Wordpress Header 
 * Version: 1.0
 * Author: Mohamed Safouan Besrour
 * Author URI: http://besrourms.github.io/
 */
//Wordpress Header Optimization
function whtop_setup()
{
    remove_action( 'wp_head', 'feed_links_extra', 3); // Remove category feeds
    remove_action( 'wp_head', 'feed_links', 2); // Remove Post and Comment Feeds
    remove_action( 'wp_head', 'rsd_link' ); //Remove the EditURI/RSD link
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head');
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'index_rel_link' );
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
   
    remove_action( 'rss2_head', 'the_generator' );
    remove_action( 'rss_head',  'the_generator' );
    remove_action( 'rdf_header', 'the_generator' );
    remove_action( 'atom_head', 'the_generator' );
    remove_action( 'commentsrss2_head', 'the_generator' );
    remove_action( 'opml_head', 'the_generator' );
    remove_action( 'app_head',  'the_generator' );
    remove_action( 'comments_atom_head', 'the_generator' );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
    // Disable REST API v1
    add_filter('json_enabled','__return_false');
    add_filter('json_jsonp_enabled','__return_false');
    // Disable REST API v2
    add_filter('rest_enabled','__return_false');
    add_filter('rest_jsonp_enabled','__return_false');
}
add_action( 'after_setup_theme', 'whtop_setup' );

//Remove CSS & JS Version
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) || strpos( $src, '&ver=' ))
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
