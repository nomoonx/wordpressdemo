<?php
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once get_template_directory() . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

/**********************************************************************************
/* Paging *
 **********************************************************************************/
require_once(get_template_directory().'/functions/pagination.php');

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_slider-options',
        'title' => 'Slider Options',
        'fields' => array (
            array (
                'key' => 'field_536c7915da76c',
                'label' => 'Featured Slider',
                'name' => 'featured_slider',
                'type' => 'true_false',
                'instructions' => 'Enable Featured Slider',
                'message' => 'Enable Slider ?',
                'default_value' => 0,
            ),
            array (
                'key' => 'field_536c7a626da29',
                'label' => 'Slider Image',
                'name' => 'slider_image',
                'type' => 'image',
                'instructions' => 'Ideal image\'s height should be 400px.',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}


function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name'               => 'Advanced Custom Fields', // The plugin name.
            'slug'               => 'advanced-custom-fields', // The plugin slug (typically the folder name).
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'external_url'       => 'http://wordpress.org/plugins/advanced-custom-fields', // If set, overrides default API URL and points to an external URL.
        )

    );
}
