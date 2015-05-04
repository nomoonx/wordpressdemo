<?php
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/plugin/' );
require_once get_template_directory() . '/plugin/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );
?>