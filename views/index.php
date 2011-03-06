<?php
$page = new QuickSkin('default/index.html');
// do substitute of template image directory
$page->assign('tpl_img',     'tplimgs/');
$page->assign('url_img',     _URL_USRIMG);

// do substitute of template javascript directory
$page->assign('tpl_js',      'tpljs/');
$page->assign('url_js',      _URL_USRJS);

//do substitute of template CSS directory
$page->assign('tpl_css',     'tplcss/');
$page->assign('url_css',     _URL_USRCSS);

$query = "SELECT COUNT(*) FROM gente";
$res = executeQuery( $query);
$data = mysql_fetch_assoc($res);
$page->assign('total_registros',  $data['COUNT(*)']);


$query = "SELECT * FROM `municipios`;";
$res = executeQuery($query);
$resi = $res;
$lista_municipios = '';
//create the array with alla communes
while ($row = mysql_fetch_assoc($res)) {
      $records[] = $row;
}
//make the communes list
foreach ($records as $row) {
	$lista_municipios .= '<li><a href="/municipio/' .$row['id'] .'/">' .$row['nombre'] .'</a></li>';
}
$page->assign('municipios',  $lista_municipios);

//create communes random list
$municipios_random = array_rand($records, 10);
$random_list = '';
foreach ($records as $mun) {
	if (in_array($mun['id'], $municipios_random)) {
		$random_list .= '<a href="/municipio/' . $mun['id'] . '/">'
						. '<img src="images/municipios/' . $mun['id'] . '.jpg" alt="' . htmlentities($mun['nombre'], ENT_QUOTES) . ': ' . htmlentities($mun['descripcion'], ENT_QUOTES) 
						. '" title="' . htmlentities($mun['nombre'], ENT_QUOTES) .': ' . htmlentities($mun['descripcion'], ENT_QUOTES) . '" />'
						. '</a>';
	}
}
$page->assign('municipios_rand', $random_list);

/*
$query = "SELECT mun_id, COUNT(*) FROM gente GROUP BY mun_id";
$resm = executeQuery($query);
$lista_municipios_count = '';
$array_municipios_count = array();
$i = 0;
while ($row = mysql_fetch_assoc($resm)) {
      mysql_data_seek($resi, $row['mun_id'] - 1);
      $list = mysql_fetch_assoc($resi);
      $array_municipios_count[$i++] = '<li><a href="/municipio/' .$row['mun_id'] .'/">' . $list['nombre'] .'(' . $row['COUNT(*)'] .')</a></li>';
}
$array_municipios_rand = array_rand($array_municipios_count, 2);
foreach ($array_municipios_rand as $id){
	$lista_municipios_count .= $array_municipios_count[$id];
}
$page->assign('municipios_contador',  $lista_municipios_count);
*/
$page->assign('page_title', 'Home');
$page->output();
