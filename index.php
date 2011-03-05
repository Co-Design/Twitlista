<?php
error_reporting(E_ALL);
/**
 * General Manager and dispatcher for the app
 * 
 * load all require libraries to app execution
 * and make a "small" distpacher whit load, the app run. 
 * @author Jesus Christian Cruz Acono <devel@compermisosnetwork.info>
 * @version 0.0.2
 * @package Twitlista
*/
/**
 * general config values
 */
require_once (_DIR_SITE . 'config.php');


/**
 * Proyect libs
 */
 
 
/**
 * Load the internal DB Manager.
 */
include_once (_DIR_SITE . 'db_manager.php');

/**
 * load Twitter api implementation for the proyect
 */
include_once (_DIR_SITE . 'twitter_api.php');


/**
 * 3rd party libs
 */

/**
 * load Twitter Api Lib (external provider)
 */
require_once(_DIR_LIB . 'twitteroauth/twitteroauth.php');
/**
 * Load the skin template.
 */
include_once (_DIR_LIB . 'class.quickskin.php');


/**
 * app Dispacther
 */
$url_request = split('/' , $_SERVER['REQUEST_URI']);
$action = strtolower($url_request[1]);
switch ($action) {
case 'municipio':
	include_once(_PATH_HOME . 'views/municipio.php');
	break;
case 'gente':
	include_once(_PATH_HOME . 'views/gente.php');
	break;
case 'mapa':
    include_once(_PATH_HOME . 'views/mapa.php');
    break;
default:
	include_once(_PATH_HOME . 'views/index.php');
}
?>
