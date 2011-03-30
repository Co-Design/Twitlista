<?php
function connect() {
	global $logger;
	$databaseResponse = mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWD);
	$logger->debug('start conection to db');
	$selectResult = mysql_select_db( MYSQL_DB ) or die($logger->fatal('the conection fail'));
}

function executeQuery($query) {
	global $logger;
	$logger->info('start execution to db');
	connect();
	$logger->debug('query to execute ' . $query);
	$result = mysql_query($query);
	$err = mysql_error();
	if( $err != "" ) {
		$logger->fatal('the query fail. MySQL error: ' . $err);
		exit();
	} else {
		mysql_close();
		return $result;
	}
}
