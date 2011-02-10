<?php
function update_registro($id){
	echo "update";
	$query = "SELECT * FROM `gente` WHERE `id` =" . $id;
	$res = executeQuery( $query);
	$row = mysql_fetch_assoc($res);
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $row['token'], $row['token_secret']);
	$content = $connection->get('account/verify_credentials');
	$query_insert = "UPDATE `Compermisos`.`gente` SET 
	`username` = '" . $content->screen_name . "',
	`name` = '" . $content->name . "'," .
	"`img_url` = '" . $content->profile_image_url . "',".
	"`timestamp` = '" . time(). "' " .
	"WHERE `gente`.`id` = " . $content->id . ";";
	#echo($query_insert);
	executeQuery($query_insert);
}