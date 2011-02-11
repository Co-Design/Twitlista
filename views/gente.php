<?php
$page = new QuickSkin('default/gente.html');
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
FROM `gente`
WHERE `id` =" . $url_request[2];
$res = executeQuery( $query);
$row = mysql_fetch_assoc($res);
$page->assign('img_url', $row['img_url']);
$page->assign('nombre', $row['name']);
$page->assign('username', $row['username']);
$timestampDiff = time()-$row['timestamp'];
$page->assign('fecha', number_format($timestampDiff/60, 0));


$query = "SELECT *
FROM `municipios`
LIMIT 0 , 500 ";
$resi = executeQuery( $query);
mysql_data_seek($resi, $row['mun_id'] -1 );
$list = mysql_fetch_assoc($resi);
$page->assign('municipio',  $list['nombre']);

$page->output();

if($timestampDiff >UPDATE_TIME){
	update_registro($row['id']);
}