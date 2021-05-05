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
spl_autoload_register( function($className) {
    
    $calledClass    = str_replace( '\\', DIRECTORY_SEPARATOR, str_replace( '_', '-', strtolower($className) ) );
    $parentDir      = dirname(__FILE__) . DIRECTORY_SEPARATOR;
    
    // Require main parent classes
    $parentClass    = $parentDir . 'classes' . DIRECTORY_SEPARATOR . $calledClass . '.php';

    if( file_exists($parentClass) ) {
        require_once( $parentClass );
        return;
    } 
    
    // Require Vendor (composer) classes
    $classNames     = explode(DIRECTORY_SEPARATOR, $calledClass);
    array_splice($classNames, 2, 0, 'src');

    $vendorClass    = $parentDir . 'vendor' . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $classNames) . '.php';

    if( file_exists($vendorClass) ) {
        require_once( $vendorClass );    
    }
   
} );

/**
 * Set-up the updater
 */
$updater = MakeitWorkPress\WP_Updater\Boot::instance();
$updater->add(['source' => 'https://github.com/makeitworkpress/plugin-updater-test', 'type' => 'plugin']);