<?php
$index_html = new html_blokk;
$cikk = new cikkszoveg($db);

$menu = filter_input(INPUT_GET, 'menu');
$almenu = filter_input(INPUT_GET, 'almenu');

if (($menu) AND ($menu != 'magyar') AND ($menu != 'romana') AND ($menu != 'english')){
	$cikk->mysql_read($menu, $_SESSION[lang]);
	
	if ($cikk->php_file){
	   require_once 'inc/'.$cikk->php_file;
	}
	
	if ($menu == 'kategoria'){
		require_once 'inc/csoport.php';
	}
	
	if ($menu == 'alkategoria'){
		require_once 'inc/alcsoport.php';
	}
	
	if ($menu == 'termek'){
	  require_once 'inc/termek.php';
	}
	
}
else {	
   $cikk->mysql_read('cimlap', $_SESSION[lang]);
   require_once 'inc/slider.php';
}

if (!$tartalom){
   $tartalom = '<h1>'.$cikk->cim .'</h1>'. $cikk->tartalom.$cikk_php_html;
}