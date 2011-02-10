<uo><?php
include_once 'config.php';
include_once 'db_manager.php';


$query = "SELECT *
FROM `municipios`
LIMIT 0 , 60 ";
$res = executeQuery( $query);
while ($row = mysql_fetch_assoc($res)) {
      ?><li><a href="/municipio/<?php echo $row['id'];?>/"><?php echo $row['nombre'];?></a></li></th><?
      $i++;
    }
    
    ?></uo>
    
    
    $query_municipios = "SELECT *
FROM `municipios`
LIMIT 0 , 60 ";

$query = "SELECT COUNT(*) FROM gente";
$res = executeQuery( $query);
print_r(mysql_fetch_assoc($res));
echo($query);


$query_insert = "INSERT INTO `Compermisos`.`gente` (
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
'177619674', 'galanvecindad', 'galanvecindad', ' http://a2.twimg.com/sticky/default_profile_images/default_profile_1_normal.png', '5',
CURRENT_TIMESTAMP , 'cffff', 'dddddd'
);";
