<?php
/*
Plugin Name:  API Topclass
Plugin URI:   http:/topclass.club
Description:  API Topclass WordPress Plugin
Version:      1.0
Author:       Nicolás Zakrzewicz
Author URI:   http:/topclass.club
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
*/

///////////////////////////////////////////////////////////////////////

/* add_filter( 'wpseo_debug_markers', '__return_false' );
  
function add_cors_http_header() {
    header("Access-Control-Allow-Origin: *");
}
add_action('init', 'add_cors_http_header');

add_filter( 'wp_is_application_passwords_available', '__return_true' ); */

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
}, 10, 4 );
  
function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

define('ALLOW_UNFILTERED_UPLOADS', true);

function add_theme_scripts() {  
    wp_enqueue_style( 'tc', plugins_url( 'tc-styles.css', __FILE__ ), array(), '1.2', 'all');
}
  
add_action( 'wp_enqueue_scripts', 'add_theme_scripts', 10000 );

remove_filter ('the_content', 'wpautop');
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

//Add our custom template to the admin's templates dropdown
add_filter( 'theme_page_templates', 'pluginname_template_as_option', 10, 3 );
function pluginname_template_as_option( $page_templates, $theme, $post ){

    $page_templates['page-coming-soon.php'] = 'Coming Soon Page';

    return $page_templates;

}

//When our custom template has been chosen then display it for the page
add_filter( 'template_include', 'pluginname_load_template', 99 );
function pluginname_load_template( $template ) {

    global $post;
    $custom_template_slug   = 'page-coming-soon.php';
    $page_template_slug     = get_page_template_slug( $post->ID );

    if( $page_template_slug == $custom_template_slug ){
        return plugin_dir_path( __FILE__ ) . $custom_template_slug;
    }

    return $template;

}
?>