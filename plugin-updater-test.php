<?php
/**
 * Plugin Name:  Plugin Updater Test
 * Plugin URI:   https://www.makeitwork.press/
 * Description:  WordPress Plugin used to test the updater script.
 * Version:      1.0
 * Author:       Make it WorkPress
 * Author URI:   https://www.makeitwork.press/
 * License:      GPL3
 * License URI:  https://www.gnu.org/licenses/gpl-3.0.html
 * 
 * This is an example WordPress Plugin to test the updater script 
 */

/**
 * Set-up our autoloader from composer
 */
spl_autoload_register( function($class_name) {
    
    $called_class   = str_replace( '\\', '/', str_replace('_', '-', $class_name) );
    
    // Plugin Classes
    $plugin_spaces  = explode( '/', str_replace( 'plugin-updater-test/', '', $called_class) );
    $final_class    = array_pop($plugin_spaces);
    $class_rel_path = $plugin_spaces ? implode('/', $plugin_spaces) . '/class-' . $final_class : 'class-' . $final_class;
    $class_file     = dirname(__FILE__) .  '/classes/' . $class_rel_path . '.php';
    
    if( file_exists($class_file) ) {
        require_once( $class_file );
        return;
    }

    // Require Vendor (composer) classes
    array_splice($plugin_spaces, 2, 0, 'src');
    $vendor_class_file  = dirname(__FILE__) . '/vendor/' . implode(DIRECTORY_SEPARATOR, $plugin_spaces) . '/' . $final_class . '.php';

    if( file_exists($vendor_class_file) ) {
        require_once( $vendor_class_file );    
    }    
});

/**
 * Set-up the updater
 */
$updater = MakeitWorkPress\WP_Updater\Boot::instance();
$updater->add(['source' => 'https://github.com/makeitworkpress/plugin-updater-test', 'type' => 'plugin']);
