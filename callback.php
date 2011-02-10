<?php
/**
 * @file
 * Take the user when they return from Twitter. Get access tokens.
 * Verify credentials and redirect to based on response from Twitter.
 */

/* Start session and load lib */
session_start();
require_once 'config.php';
include_once 'db_manager.php';
include_once (_PATH_HOME .'lib/class.quickskin.php');
include_once 'twitter_api.php';
require_once('lib/twitteroauth/twitteroauth.php');

/* If the oauth_token is old redirect to the connect page. 
if (isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
  $_SESSION['oauth_status'] = 'oldtoken';
  header('Location: ./clearsessions.php');
}
*/
/* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

/* Request access tokens from twitter */
$access_token = $connection->getAccessToken($_GET['oauth_verifier']);

/* Save the access tokens. Normally these would be saved in a database for future use. */
$_SESSION['access_token'] = $access_token;

/* Remove no longer needed request tokens */
unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);

$mun_id = $_GET['mun_id'];
if(!is_numeric($mun_id)){
	$mun_id = 5;
}
$content = $connection->get('account/verify_credentials');


$query_insert = "REPLACE INTO `gente` (
`id` ,
`username` ,
`name` ,
`img_url` ,
`mun_id` ,
`timestamp` ,
`token` ,
`token_secret`
)
VALUES (
'" . $content->id . "', '" . $content->screen_name . "', '" . $content->name . "', '" . $content->profile_image_url . "', '" . $mun_id . "',
" . time(). " , '" .$access_token['oauth_token'] ."', '" .$access_token['oauth_token_secret'] ."'
);";

executeQuery($query_insert);
session_destroy();

/* If HTTP response is 200 continue otherwise send to connect page to retry */
if (200 == $connection->http_code) {
  /* The user has been verified and the access tokens can be saved for future use */

  header('Location: ./gente/'. $content->id);
} else 
  /* Save HTTP status for error dialog on connnect page.*/
  header('Location: ./redirect.php?mun_id=' . $mun_id);#*/
