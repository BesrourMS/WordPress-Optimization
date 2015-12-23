<?php
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
}
add_action( 'after_setup_theme', 'whtop_setup' );

?>
