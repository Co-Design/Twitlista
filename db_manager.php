<?php
function connect() {
	$databaseResponse = mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWD);
	$selectResult = mysql_select_db( MYSQL_DB ) or die();
}

function executeQuery($query) {
	connect();
	$result = mysql_query($query);
	$err = mysql_error();
	if( $err != "" ) {
		echo "Error: $err";
		exit();
	} else {
		mysql_close();
		return $result;
	}
}
