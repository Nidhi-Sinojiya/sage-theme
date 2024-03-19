<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('sage/jquery-ui', 'https://code.jquery.com/ui/1.13.2/jquery-ui.js', ['jquery'],  null, true);
    wp_enqueue_style('sage/jquery-ui-css', 'https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css', null, true); 
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Wilder Group Main Navigation', 'sage'),
        'primary_inner_navigation' => __('Wilder Group Inner Menu One', 'sage'),
        'primary_inner_navigation_two' => __('Wilder Group Inner Menu Two', 'sage'),
        'wilder_group_footer' => __('Wilder Group Footer Menu', 'sage'),
        'entim_mara_header_menu' => __('Entim Mara Header Menu', 'sage'),
        'entim_mara_footer_menu' => __('Entim Mara Footer Menu', 'sage'),
        'the_cliff_header_menu' => __('The Cliff Header Menu', 'sage'),
        'the_cliff_footer_menu' => __('The Cliff Footer Menu', 'sage'),
        'ilkeliani_header_menu' => __('Ilkeliani Header Menu', 'sage'),
        'ilkeliani_footer_menu' => __('Ilkeliani Footer Menu', 'sage'),
        'lerai_safari_camp_header_menu' => __('Lerai Safari Camp Header Menu', 'sage'),
        'lerai_safari_camp_footer_menu' => __('Lerai Safari Camp Footer Menu', 'sage'),
        'the_river_camp_header_menu' => __('The River Camp Header Menu', 'sage'),
        'the_river_camp_footer_menu' => __('The River Camp Footer Menu', 'sage'),
        'mara_ballooning_header_menu' => __('Mara Ballooning Header Menu', 'sage'),
        'mara_ballooning_footer_menu' => __('Mara Ballooning Footer Menu', 'sage'),
        'ride_maasi_mara_header_menu' => __('Ride Maasi Mara Header Menu', 'sage'),
        'ride_maasi_mara_footer_menu' => __('Ride Maasi Mara Footer Menu', 'sage'),
        'cliff_boat_safaris_header_menu' => __('Cliff Boat Safaris Header Menu', 'sage'),
        'cliff_boat_safaris_footer_menu' => __('Cliff Boat Safaris Footer Menu', 'sage'),
        'olerai_conservancy_header_menu' => __('Olerai Conservancy Header Menu', 'sage'),
        'olerai_conservancy_footer_menu' => __('Olerai Conservancy Footer Menu', 'sage'),       
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});
