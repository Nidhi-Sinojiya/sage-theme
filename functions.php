<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

try {
    \Roots\bootloader();
} catch (Throwable $e) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://docs.roots.io/acorn/2.x/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| Enable Sage Theme Support
|--------------------------------------------------------------------------
|
| Once our theme files are registered and available for use, we are almost
| ready to boot our application. But first, we need to signal to Acorn
| that we will need to initialize the necessary service providers built in
| for Sage when booting.
|
*/

add_theme_support('sage');

function login_logo(){
    echo '<style type="text/css">
        #login { padding: 10% 0 0; position: relative; z-index: 9;}
        body{background-image: url(' . get_bloginfo('template_directory') . '/resources/images/banner-bg.jpg) !important;background-size: cover !important; position: relative; background-position: 45%; background-repeat: no-repeat; }
        body::before { content: ""; position: absolute; left: 0; top: 0; width: 100%; height: 100%;background: rgba(0, 0, 0, 0.3); }
        p a{color:rgb(250, 247, 242);}
        .privacy-policy-page-link a{color:rgb(250, 247, 242);}
        h1 a{background-image: url(' . get_bloginfo('template_directory') . '/resources/images/logo.png) !important;background-size: 75% !important; width:100% !important;margin: 0 auto !important; box-shadow: none !important; height: 90px !important;}
        #nav a{color:rgb(250, 247, 242) !important;}
        #backtoblog a{color:rgb(250, 247, 242) !important;}
        .wp-core-ui .button-primary {
            background: #191919;
            border-color: rgb(250, 247, 242);
            color: rgb(250, 247, 242);
            text-decoration: none;
            text-shadow: none;
        }.wp-core-ui .button-secondary {
            color: #191919;}
        .wp-core-ui .button-primary:hover {
            background:#fff;
            border-color: #191919;
            color: #191919;
        }input[type=password]:focus,input[type=text]:focus,input[type=checkbox]:focus{border-color: #191919;
            box-shadow: 0 0 0 1px #191919;
            outline: 2px solid transparent;}
        </style>';
}
add_action('login_head', 'login_logo');

function my_login_logo_url(){
    return esc_url(home_url('/'));
}
add_filter('login_headerurl', 'my_login_logo_url');

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

add_filter( 'walker_nav_menu_start_el', 'hrt_span_to_nav_menu', 10, 4 );
function hrt_span_to_nav_menu( $item_output, $item, $depth, $args ) {
    if(in_array('menu-item-has-children', $item->classes)){ 
        if('primary_inner_navigation' == $args->theme_location && $depth === 0 ){
            $title = apply_filters('the_title', $item->title, $item->ID);
            $img_arrow = @asset('images/white-arrow.png');
            $item_output = '<a href="'. $item->url .'">'. $title .'</a><span class="submenu-button"><img src="'. $img_arrow .'" alt=""></span>';
        }
    }
    return $item_output;
}

// Check stay.
add_filter( 'gform_field_content_1_78', 'check_stay_dynamic', 10, 5 );
function check_stay_dynamic( $content, $field, $value, $lead_id, $form_id ) {
    if(!empty($_POST['input_76']) || !empty($_POST['input_96'])){
        $content_split = explode(" Entim Mara Camp",$content);
        $new_content_start = reset($content_split);
        $new_content_middle = (isset($_POST['input_76'])) ? $_POST['input_76'] : $_POST['input_96'];
        $new_content_end = end($content_split); 
        $content = $new_content_start." ".$new_content_middle."".$new_content_end;     
    }
    return $content;
}

// function stay_url_rewrite( $post_link, $post ){
//     if ( $post->post_type === 'accommodation' ){
//         $terms = wp_get_object_terms( $post->ID, 'accommodation_category' );
//         if( $terms ){
//             return str_replace( '%accommodation_category%' , $terms[0]->slug , $post_link );
//         }
//     }
//     return $post_link;
// }
// add_filter( 'post_type_link', 'stay_url_rewrite', 1, 2 );

// Exclude testimonial from search
add_action('init', 'remove_custom_type_from_search', 99);
function remove_custom_type_from_search() {
    global $wp_post_types;
    if (post_type_exists('testimonial')) {
        // exclude from search results
        $wp_post_types['testimonial']->exclude_from_search = true;
    }
}