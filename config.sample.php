<?php

/**
 * @file
 * A single location to store configuration.
 */

define('CONSUMER_KEY', 'eaaeaeaee');
define('CONSUMER_SECRET', 'aeaeaaeaeaeea');
define('OAUTH_CALLBACK', 'http://twitlista.generandomaldad.net/callback.php?mun_id=');
define('UPDATE_TIME', 3500);

define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'eaeaeaae');
define('MYSQL_PASSWD', 'eaeaeeaea');
define('MYSQL_DB', 'eaaeaee');



//stop the normal changeable values
$dirTmp = getcwd();
// define the "root" directory of the application
if (!defined('_DIR_SITE')) {
  if ( strlen( substr($dirTmp,strlen($_SERVER['DOCUMENT_ROOT']) + 1) ) > 0 ) {
    define('_DIR_SITE', substr($dirTmp,strlen($_SERVER['DOCUMENT_ROOT']) + 1) . "/");
  } else {
    define('_DIR_SITE', '');
  }
}
// define the "root" URL of the application
if (!defined('_URL_HOME')) {
  if ( strlen( substr($dirTmp,strlen($_SERVER['DOCUMENT_ROOT']) + 1) ) > 0 ) {
    define('_URL_HOME', "http://" . $_SERVER['HTTP_HOST'] . "/" . substr($dirTmp,strlen($_SERVER['DOCUMENT_ROOT']) + 1) . "/");
  } else {
    define('_URL_HOME', "http://" . $_SERVER['HTTP_HOST'] . "/");
  }
}

// define the paths and URLs of the application
if (!defined('_PATH_HOME'))  { 
	define('_PATH_HOME',  $dirTmp . "/"); 
}
//the skins dir
if (!defined('_PATH_SKINS')) {
	define('_PATH_SKINS', _PATH_HOME . "_skins/");
}
if (!defined('_URL_SKINS'))  { 
	define('_URL_SKINS',  _URL_HOME . "_skins/"); 
}
if (!defined('_PREF_TPL'))   { 
	define('_PREF_TPL',   "default/"); 
}
if (!defined('_URL_USRIMG')) { 
	define('_URL_USRIMG', _URL_SKINS . _PREF_TPL . "tplimgs/"); 
}
if (!defined('_URL_USRCSS')) { 
	define('_URL_USRCSS', _URL_SKINS . _PREF_TPL . "tplcss/"); 
}
if (!defined('_URL_USRJS'))  { 
	define('_URL_USRJS',  _URL_SKINS . _PREF_TPL . "tpljs/"); 
}
if (!defined('_DIR_LIB'))  { 
	define('_DIR_LIB',  _PATH_HOME . 'lib/'); 
}

if (!defined('LOCALE_DIR'))  { 
	define('LOCALE_DIR', _PATH_HOME .'/locale');
}
if (!defined('DEFAULT_LOCALE'))  { 
	define('DEFAULT_LOCALE', 'es_MX');
}

if (!defined('LOG4PHP_DIR'))  { 
	define('LOG4PHP_DIR', _DIR_LIB .'log4php/');
} 