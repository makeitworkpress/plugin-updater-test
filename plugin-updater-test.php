<?php
/**
 * Plugin Name:  Plugin Updater Test
 * Plugin URI:   https://www.makeitwork.press/
 * Description:  WordPress Plugin used to test the updater script.
 * Version:      0.5
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
spl_autoload_register( function($classname) {

    $class      = str_replace( '\\', DIRECTORY_SEPARATOR, str_replace( '_', '-', strtolower($classname) ) );
    $vendor     = str_replace( 'makeitworkpress' . DIRECTORY_SEPARATOR, '', $class );
    $vendor     = 'makeitworkpress' . DIRECTORY_SEPARATOR . preg_replace( '/\//', '/src/', $vendor, 1 ); // Replace the first slash for the src folder
    $vendors    = dirname(__FILE__) .  DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . $vendor . '.php';
    
    if ( file_exists( $vendors) ) {
        include_once $vendors;
    }

} );


/**
 * Set-up the updater
 */
new MakeitWorkPress\WP_Updater\Boot([
    'request'       =>  [],
    'source'        => 'https://github.com/makeitworkpress/plugin-updater-test',
    'type'          => 'plugin'
]);