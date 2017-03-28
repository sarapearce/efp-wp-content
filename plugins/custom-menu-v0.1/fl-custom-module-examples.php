<?php
/**
 * Plugin Name: Custom Menu Module  
 * Plugin URI: 
 * Description: A custom, popout overlay menu
 * Version: 0.1
 * Author: Sara Pearce of Left Turn Only
 * Author URI: http://leftturnonly.tv
 * 
 */
define( 'FL_MODULE_EXAMPLES_DIR', plugin_dir_path( __FILE__ ) );
define( 'FL_MODULE_EXAMPLES_URL', plugins_url( '/', __FILE__ ) );

/**
 * Custom modules
 */
function fl_load_module_examples() {
	if ( class_exists( 'FLBuilder' ) ) {
	    require_once 'basic-example/basic-example.php';
	    require_once 'example/example.php';
	}
}
add_action( 'init', 'fl_load_module_examples' );

/**
 * Custom fields
 */
function fl_my_custom_field( $name, $value, $field ) {
    echo '<input type="text" class="text text-full" name="' . $name . '" value="' . $value . '" />';
}
add_action( 'fl_builder_control_my-custom-field', 'fl_my_custom_field', 1, 3 );

/**
 * Custom field styles and scripts
 */
function fl_my_custom_field_assets() {
    if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
        wp_enqueue_style( 'my-custom-fields', FL_MODULE_EXAMPLES_URL . 'assets/css/fields.css', array(), '' );
        wp_enqueue_script( 'my-custom-fields', FL_MODULE_EXAMPLES_URL . 'assets/js/fields.js', array(), '', true );
    }
}
add_action( 'wp_enqueue_scripts', 'fl_my_custom_field_assets' );