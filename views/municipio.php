<?php
if(!is_numeric($url_request[2])){
		$url_request[2]=5;
}
$page = new QuickSkin('default/municipio.html');
// do substitute of template image directory
$page->assign('tpl_img',     'tplimgs/');
$page->assign('url_img',     _URL_USRIMG);

// do substitute of template javascript directory
$page->assign('tpl_js',      'tpljs/');
$page->assign('url_js',      _URL_USRJS);

// do substitute of template CSS directory
$page->assign('tpl_css',     'tplcss/');
$page->assign('url_css',     _URL_USRCSS);



$query = "SELECT *
FROM `municipios`
LIMIT 0 , 500 ";
$resi = executeQuery( $query);
mysql_data_seek($resi, $url_request[2] - 1);
$list = mysql_fetch_assoc($resi);
$page->assign('mombre_municipio',  $list['nombre']);



$query = "SELECT *
FROM `gente`
WHERE `mun_id` =" . $url_request[2];
$res = executeQuery( $query);
$registros = '';
while ($row = mysql_fetch_assoc($res)) {
      $registros .= '<li><a href="/gente/' .$row['id'] .'/"><img src="' .$row['img_url'] .'"/>@' .$row['username'] .'<br/>' .$row['name'] .'</a></li>';
}
$page->assign('registros',  $registros);
$page->assign('mun_id',  $url_request[2]);
$page->assign('cantidad_registros',  mysql_num_rows($res));

$page->output();