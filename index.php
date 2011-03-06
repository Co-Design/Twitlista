<?php
error_reporting(E_ALL);
/**
 * A 'small' description
 * 
 * a 'full'description
 * multilene is cool
 * and big number is more cool
 * @author Jesus Christian Cruz Acono <devel@compermisosnetwork.info>
 * @version 0.0.1
 * @package sample
*/
/**
 * general confi values
 */
require_once 'config.php';
include_once 'db_manager.php';
include_once (_PATH_HOME .'lib/class.quickskin.php');
include_once 'twitter_api.php';
require_once('lib/twitteroauth/twitteroauth.php');

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
case 'municipios':
    include_once(_PATH_HOME . 'views/municipios.php');
    break;
default:
	include_once(_PATH_HOME . 'views/index.php');
}
?>
