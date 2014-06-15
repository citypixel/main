<?php
session_start();
require_once('parameters.php');
require_once('inc/functions.php');
require_once('inc/class.php');
require_once('smarty.php');

$smarty = new Smarty();

$adatkapcsolat = new data_connect;
$adatkapcsolat->connect();

require_once('nyelv.php');
require_once('inc/tartalomvalasztas.php');

$css = new css;
$css->css_check();
$css->css_changer_on();

$font_kieg = '';

require_once('inc/menu.php');
$smarty->assign('tartalom', $tartalom);
$smarty->assign('alcim', $alcim);
$smarty->assign('slider', $slider);
$smarty->assign('menu_fent', $menu_fent);
$smarty->assign('menu', $menu);
$smarty->assign('lang', $lang);
$smarty->assign('css_kieg', $_SESSION[css]);
$smarty->assign('css_valaszto', $css->css_changer);
$smarty->assign('admin_konyvtar', $admin_konyvtar);
$smarty->assign('MAIN_DIRECTORY', MAIN_DIRECTORY);
	 
$smarty->display('templates/index.tpl');