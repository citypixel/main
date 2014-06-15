<?php
$result = mysql_query("SELECT sorszam, menunev, hivatkozas FROM ".$_SESSION[adatbazis_etag]."_szoveg WHERE menu_fent = '1' AND nyelv='$_SESSION[lang]' ORDER BY sorrend");
while ($next_element = mysql_fetch_array($result)){
   $sorszam = $next_element[sorszam];
   $menu_fent[$sorszam][menunev] = $next_element[menunev];
   $menu_fent[$sorszam][hivatkozas] = $next_element[hivatkozas];
}

$result = mysql_query("SELECT id, hivatkozas, kategorianev_hu, kategorianev_en, kategorianev_ro FROM ".$_SESSION[adatbazis_etag]."_kategoriak WHERE szulo='0' ORDER BY sorrend");
while ($next_element = mysql_fetch_array($result)){
   $id = $next_element[id];
   $menunev = 'kategorianev_'.$_SESSION[lang];
   $termekek_oldalmenu[$id][menunev] = $next_element[$menunev];
   $termekek_oldalmenu[$id][hivatkozas] = $next_element[hivatkozas];
   $termekek_oldalmenu[$id][almenu] = '
				  <div class="almenu">
					 <a href="termek-mwp">MWP</a>
					 <a href="termek-ps/c2">PS/C2</a>
					 <a href="termek-sw/1">SW/1</a>
					 <a href="termek-ad">AD</a>
				  </div>';
   unset($termekek_oldalmenu[$id][almenu]);
}