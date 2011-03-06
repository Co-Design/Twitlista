<?php
$page = new QuickSkin('default/municipios.html');
// do substitute of template image directory
$page->assign('tpl_img',     'tplimgs/');
$page->assign('url_img',     _URL_USRIMG);

// do substitute of template javascript directory
$page->assign('tpl_js',      'tpljs/');
$page->assign('url_js',      _URL_USRJS);

//do substitute of template CSS directory
$page->assign('tpl_css',     'tplcss/');
$page->assign('url_css',     _URL_USRCSS);


$page->assign('page_title',  'Municipios');
$page->output();