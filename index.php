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
require_once('config.php');


/**
 * Proyect libs
 */
 
 
/**
 * Load the internal DB Manager.
 */
include_once(_PATH_HOME . 'db_manager.php');

/**
 * load Twitter api implementation for the proyect
 */
include_once(_PATH_HOME . 'twitter_api.php');

/**
 * 3rd party libs
 */

/**
 * load Twitter Api Lib (external provider)
 */
require_once(_DIR_LIB . 'twitteroauth/twitteroauth.php');

/**
 * Load the skin manager.
 */
require_once(_DIR_LIB . 'class.quickskin.php');

/**
 * Load the log manager.
 */
require_once(LOG4PHP_DIR . 'LoggerManager.php');


/**
 *start the logger manager
 */
$logger =& LoggerManager::getLogger('main');
$logger->info('Twitlista now run ');

/**
 * app Dispacther
 */
$url_request = preg_split('//' , $_SERVER['REQUEST_URI']);
$action = strtolower($url_request[1]);
$logger->debug('called ' . $action);

switch ($action) {
case 'municipio':
	$logger->info('load municipio');
	include_once(_PATH_HOME . 'views/municipio.php');
	break;
case 'gente':
	$logger->info('load gente');
	include_once(_PATH_HOME . 'views/gente.php');
	break;
case 'mapa':
    $logger->info('load mapa');
    include_once(_PATH_HOME . 'views/mapa.php');
    break;
case 'municipios':
    $logger->info('load municipios');
    include_once(_PATH_HOME . 'views/municipios.php');
    break;
default:
	$logger->info('load index');
	include_once(_PATH_HOME . 'views/index.php');
}
