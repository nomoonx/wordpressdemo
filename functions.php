<?php

function vision_setup() {

    /* Content Width */
    if ( ! isset( $content_width ) )
        $content_width = 745;


    add_theme_support( 'automatic-feed-links' );


    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );


    add_theme_support( 'post-formats', array(
        'aside', 'audio', 'image', 'quote', 'video', 'link', 'status', 'chat'
    ) );

    add_theme_support('custom-background');

    /* Menu */
    register_nav_menus(array(
        'top-menu' => __( 'Top Menu', 'noMoon' ),
        'mobile-menu' => __('Mobile Top Menu', 'noMoon'),
        'top-right-menu' => __('Top Right Menu', 'noMoon')
    ));


    /* Thumbnail Size */
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'image',745, 290, true );



}
add_action( 'after_setup_theme', 'vision_setup' );

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once get_template_directory() . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

function vision_scripts_styles() {

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );


    /* Jquery Files */

    wp_enqueue_script('vision-modernizr',get_template_directory_uri().'/js/modernizr.js',array(),'',true);

    wp_enqueue_script('vision-smoothscroll',get_template_directory_uri().'/js/SmoothScroll.js',array(),'',true);

    wp_enqueue_script('vision-slider',get_template_directory_uri().'/js/jquery.flexslider.js',array('jquery'),'',true);

    wp_enqueue_script('vision-custom',get_template_directory_uri().'/js/vision-custom.js',array('jquery'),'',true);

    wp_enqueue_script('custom',get_template_directory_uri().'/js/custom.js',array('jquery'),'',true);

    /* Custom Font */
    wp_enqueue_style( 'vision-fonts', vision_fonts_url(), array(), null );

    /* Main Stylesheet */
    wp_enqueue_style( 'vision-style', get_stylesheet_uri(), array(), '' );


}
add_action( 'wp_enqueue_scripts', 'vision_scripts_styles' );

/***********************************************************************************************/
/* Custom Comment Form */
/***********************************************************************************************/
function vision_custom_comment_form($defaults) {


    $defaults['comment_notes_before'] = '';
    $defaults['id_form'] = 'comment-form';
    $defaults['comment_field'] = '<p><textarea name="comment" id="comment" class="form-control input-sm" rows="6"></textarea></p>';

    return $defaults;
}

add_filter('comment_form_defaults', 'vision_custom_comment_form');

function vision_custom_comment_fields() {
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');

    $fields = array(
        'author' => '<p>' .
            '<input id="author" name="author" type="text" class="form-control input-sm" placeholder="Name ( required )" value="' . esc_attr($commenter['comment_author']) . '" ' . $aria_req . ' />' .

            '</p>',
        'email' => '<p>' .
            '<input id="email" name="email" type="text" class="form-control input-sm" placeholder="Email ( required )" value="' . esc_attr($commenter['comment_author_email']) . '" ' . $aria_req . ' />'  .
            '</p>',
        'url' => '<p>' .
            '<input id="url" name="url" type="text" class="form-control input-sm" placeholder="Website" value="' . esc_attr($commenter['comment_author_url']) . '" />'  .
            '</p>'
    );

    return $fields;
}

add_filter('comment_form_default_fields', 'vision_custom_comment_fields');


function vision_fonts_url() {
    $fonts_url = '';


    $oswald = _x( 'on', 'Source Sans Pro font: on or off', 'vision' );


    $bitter = _x( 'on', 'Bitter font: on or off', 'vision' );

    if ( 'off' !== $oswald || 'off' !== $bitter ) {
        $font_families = array();

        if ( 'off' !== $oswald )
            $font_families[] = 'Oswald:400,300,700:latin';

        if ( 'off' !== $bitter )
            $font_families[] = 'Bitter:400,700';

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
        $fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
    }

    return $fonts_url;
}

//widgets
function noMoon_widgets(){

    /* Dynamic Sidebar */
    register_sidebar(array(
        'id'          => 'sidebar',
        'name'        => __( 'Right Sidebar', 'vision' ),
        'description' => __( 'This sidebar is located right side.', 'vision' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));



    /* Footer Widget 1 */
    register_sidebar(array(
        'id'          => 'footer-1',
        'name'        => __( 'Left Footer Widget', 'vision' ),
        'description' => __( 'This widget is located left side.', 'vision' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));




    /* Footer Widget 2 */
    register_sidebar(array(
        'id'          => 'footer-2',
        'name'        => __( 'Middle Footer Widget', 'vision' ),
        'description' => __( 'This widget is located left side.', 'vision' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));



    /* Footer Widget 3 */
    register_sidebar(array(
        'id'          => 'footer-3',
        'name'        => __( 'Right Footer Widget', 'vision' ),
        'description' => __( 'This widget is located left side.', 'vision' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

}
add_action('widgets_init', 'noMoon_widgets');

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
