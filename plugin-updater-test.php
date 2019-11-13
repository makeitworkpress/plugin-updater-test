<?php
/**
 * Plugin Name:  Plugin Updater Test
 * Description:  WordPress Plugin used to test the updater script.
 * Version:      0.1
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
require_once 'vendor/autoload.php';

/**
 * Set-up the updater
 */
$updater = new MakeitWorkPress\WP_Updater\Boot(['type' => 'plugin', 'source' => 'https://github.com/makeitworkpress/plugin-updater-test.git']);