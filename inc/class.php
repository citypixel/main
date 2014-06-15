<?php

/**
 * Sablonkezelő
 * 
 */

class html_blokk{
	
   public $html_code;
	/** Sablon állomány és sablon adatok összeillesztése
	 * 
	 * @param string $fajlnev A sablon fájl neve
	 * @param array $tomb A sablonban cserélendő szövegelemek értékei
	 */
	
	function load_template_file($fajlnev, $tomb) {
 
		if(file_exists($fajlnev) > 0) {
			$temp = fopen($fajlnev,"r");
			$tartalom = fread($temp, filesize($fajlnev));
			fclose($temp);
	 
			$tartalom = preg_replace("/{(.*?)}/si","{\$tomb[\\1]}",$tartalom);
	 
			eval("\$tartalom = \"" . addslashes($tartalom) . "\";");
	 
			$this->html_code = $tartalom;
		}
 
	}
}

/**
 * Többnyelvű sablonok kezelése
 */

class languages{
   
   function __construct() {
	  $lang = filter_input(INPUT_GET, 'lang');
	  
	  if ($lang != ''){
			$_SESSION["lang"] = $lang;
		} else {
			if ($_SESSION["lang"] == ''){
				$_SESSION["lang"] = 'hu';
			}
		}
   }
}

/**
 * CSS stílusváltás kezelése
 * 
 * @author Molnár Zoltán <molnarzoli82@gmail.com>
 */

class css{
   
   public $css_changer;
   public $css_file;
   public $css_valaszto;
   
   /**
    * Feltölti az osztály által használt változókat
    */
   
   function __construct() {
	  $this->css_file = filter_input(INPUT_POST, 'css');
	  $this->css_valaszto = filter_input(INPUT_GET, 'css_valaszto');
   }
   
   /**
    * Megvizsgálja, hogy történt e stíluslap váltás
    */
   
   function css_check(){
	  if ($this->css_file)
	  {
		 $_SESSION["css"] = '<link rel="stylesheet" href="'.$this->css_file.'" />';
		 if ($this->css_file == 'x'){
			$_SESSION["css"] = '';
		 }
	  }
   }
   
   /**
    * Az elérhető stíluslapokat jeleníti meg
    * 
    */
   
   function css_changer_on(){
	  If ($this->css_valaszto){
		 $index_html = new html_blokk;
		 $array = array('css_file' => $this->css_file);
		 $index_html->load_template_file("templates/css_valaszto.html", $array);	 
		 $this->css_changer = $index_html->html_code;
	  }
   }
   
}

class email{
   
   function kuld(){
	  if ($_REQUEST['kuldo'] != ''){
		 $message_bevezeto = '
					 A F�t�sszolg�ltat� Kft. weboldal�ra az al�bbi �zenet �rkezett:<br /><br /><br />
					 K�ld� email c�me:<br />'.$_REQUEST[kuldo].'<br /><br />
					 �zenet:<br />'.$_REQUEST[uzenet_iroda].'<br /><br />';

					 $subject = 'F�t�sszolg�ltat� Kft. - weboldal �zenet';
					 $s_from = 'info@futesszolgaltato.hu';
					 $s_feladnev = 'F�t�sszolg�ltat� Kft.';
					 $to  = 'pczekmany@gmail.com';
					 $to2 = 'info@inkozrt.hu';
					 $message = $message_bevezeto;
					 $headers  = 'MIME-Version: 1.0' . "\r\n";
					 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					 $headers .= 'From: '.$s_feladnev.'<'.$s_from.'>' . "\r\n" .
						 'Reply-To: '.$s_from.'' . "\r\n" .
						 'X-Mailer: PHP/' . phpversion();
					 mail($to, $subject, $message, $headers);
					 mail($to2, $subject, $message, $headers);
	 }
   }
   
}


class DBFactory extends mysqli{
   public $kapcsolat;

   function __construct(){
	 $domain = $_SERVER['HTTP_HOST'];
	  if (($domain == 'localhost') OR ($domain == LOCAL_VIRTUALHOST)){
		 $this->kapcsolat = new mysqli("localhost", LOCALHOST_DB_USER, LOCALHOST_DB_PASSWORD, LOCALHOST_DB_NAME);} 
	  else {
		 $this->kapcsolat = new mysqli("localhost", DOMAIN_DB_USER, DOMAIN_DB_PASSWORD, DOMAIN_DB_NAME);
	  }
   }
}

class DBConnection {       
  protected $mysqli;
  private  $db_host="localhost";
  private  $db_name=LOCALHOST_DB_NAME;
  private  $db_username=LOCALHOST_DB_USER;
  private  $db_password=LOCALHOST_DB_PASSWORD;

  public function __construct(){
        $this->mysqli=new mysqli($this->db_host,$this->db_username,
                $this->  db_password,$this->db_name) or die($this->mysqli->error);
         return $this->mysqli;
    }

public function query($query){  // why i need to creat this function
    return $this->mysqli->query($query);
    }

public function real_escape_string($str){
    return $this->mysqli->real_escape_string();
 }
 
 public function getlink(){
	return $this->mysqli;
 }

   function __destruct(){
     //Close the Connection
     $this->mysqli->close();
    }
}


class data_connect{
	public $domain;    
   
	function connect(){
		$domain = $_SERVER['HTTP_HOST'];
		if (($domain == 'localhost') OR ($domain == LOCAL_VIRTUALHOST)){
			$kapcsolat = mysql_connect("localhost", LOCALHOST_DB_USER, LOCALHOST_DB_PASSWORD);
			$adatbazis = mysql_select_db(LOCALHOST_DB_NAME);
		}
		else {
			$kapcsolat = mysql_connect("localhost", DOMAIN_DB_USER, DOMAIN_DB_PASSWORD);
			$adatbazis = mysql_select_db(DOMAIN_DB_NAME);
		}

		if (!$kapcsolat) { die('Hiba a MySQL szerverhez kapcsolódás közben: ' . mysql_error());}
		if (!$adatbazis) { $this->create_database();}

		$ekezet = mysql_set_charset("utf8",$kapcsolat);
		
		if ($_REQUEST[db_save]){
			backup_tables($_REQUEST[table]);
		 }

		 if ($_REQUEST[db_load]){
			sql_import("db-backup.sql");
		 }
	}
        
}


class user{
	public $sorszam;
	public $nev;
	public $jog;
	public $email;
	public $csoport;
	public $belephiba;
	public $html_code;

	function login(){
		$jel = mysql_real_escape_string($_REQUEST['jelszo']);
		$azon = mysql_real_escape_string($_REQUEST['azonosito']);
		if (!$_REQUEST['azonosito']){$azon = $_SESSION["sessfelhasznaloazonosito"];}
		$jel = md5($jel);

		If ($_REQUEST['logout'] == 1) {
			unset($_SESSION["sessfelhasznalo"]);
			unset($_SESSION["sessfelhasznalosorszam"]);
			unset($_SESSION["sessfelhasznaloazonosito"]);
			unset($_SESSION["sessfelhasznalojog"]);
		}

		If ($_REQUEST['azonosito'] != "") {
			$result = mysql_query("SELECT sorszam, azonosito, jog, email FROM ".$_SESSION[adatbazis_etag]."_regisztralt WHERE azonosito = '$azon' AND jelszo = '$jel'");	
			$s = mysql_fetch_row($result);
			$mostlep == 1;
		} else {
		   if ($_SESSION[sessfelhasznalosorszam]){
			$result = mysql_query("SELECT sorszam, azonosito, jog, email FROM ".$_SESSION[adatbazis_etag]."_regisztralt WHERE sorszam = '$_SESSION[sessfelhasznalosorszam]'");	
			$s = mysql_fetch_row($result);
		   }
		}
			if ($s[2] != ""){
				$this->sorszam = $s[0];
				$this->nev = $s[1];
				$this->jog = $s[2];
				$this->email = $s[3];
				$_SESSION["sessfelhasznalo"] = $s[1];
				$_SESSION["sessfelhasznalosorszam"] = $s[0];
				$_SESSION["sessfelhasznaloazonosito"] = $s[1];
				$_SESSION["sessfelhasznalojog"] = $s[2];
				$_SESSION["sessfelhasznaloemail"] = $s[3];
				if ($mostlep){
				  $loging_db = new log_db;
				  $loging_db->write($_SESSION["sessfelhasznalosorszam"], 'Bejelentkezés');
				}
			} else {
               If ($_REQUEST['azonosito'] != "") {
				$_SESSION[messagetodiv] = '<p>Figyelem!</p><ul><li>Rossz felhasználónév, vagy jelszó!</li></ul>';
               }
			}

	}
}


class admin{
   public $html_code;

	function login_admin(){

		if ($_SESSION["sessfelhasznalojog"] == "1") {
		
			//belép
			$array = array('adminmenu' => $adminmenu);

			$admin_menuuj = new html_blokk;
			$admin_menuuj->load_template_file("templates/admin_menu.tpl",$array);
			$admin_menu = $admin_menuuj->html_code;

			//modul kiválasztása
			if ($_REQUEST[tartalom]){
				include('admin/'.$_REQUEST[tartalom].'.php');
			} else {
				include('admin/admin_cimlap.php');
			}
			
			$admin_htmluj = new html_blokk;
			$array = array('admin_torzs' => $admin_torzs,
								'admin_menu' => $admin_menu);
								
			$admin_htmluj->load_template_file("templates/admin.tpl",$array);
			$this->html_code = $admin_htmluj->html_code;	
			
			}
		else {
			//nem lép be
			if ($_REQUEST[submit]){ $belephiba = "<tr><td colspan='2' class='cedula_ar'>Rossz felhasználónév, vagy jelszó!</td><tr>";	}
			$array = array('belephiba' => $belephiba);
			
			$admin_htmluj = new html_blokk;
			$admin_htmluj->load_template_file("templates/login.tpl",$array);
			$admin_html = $admin_htmluj->html_code;
			
			$array = array('admin_torzs' => $admin_html);
			$admin_htmluj->load_template_file("templates/admin.tpl",$array);
			$this->html_code = $admin_htmluj->html_code;	
			
		}

	}
}


class cikkszoveg {
	public $html_code;
	public $cikksorszam;
	public $cim;
    
    public $hibalista;
    public $hivatkozas;
    public $menucsoport;
    public $cikk_errors = array();
	
	public $tartalom;
	public $nyelv;
	public $menu;
	public $archiv;
	public $hir;
	public $bevezeto;
	public $kiemelt;
	public $menunev;
	public $menufent;
	public $sorszam;
	
	public $kelt;
	public $megjelenes;
	public $esemeny;
	public $esemeny_ig;
	public $php_file;
	public $sorrend;
	
	function mysql_read($cikksorszam, $nyelv){
		global $adat;
		if (($nyelv == '') OR ($nyelv == 'hu')){
			$nyelvszures = "AND nyelv = 'hu'";}
		else {
			$nyelvszures = "AND nyelv = '".$nyelv."'";
		}
        if (is_numeric($cikksorszam)){
            $r = mysql_query("SELECT tartalom, cim, archiv, php_file, bevezeto, hivatkozas, menucsoport, nyelv, menu_fent, hir,
			   kiemelt, menunev, sorszam, kelt, megjelenes, esemeny, esemeny_ig, php_file, sorrend
			   FROM ".$_SESSION[adatbazis_etag]."_szoveg
			   WHERE sorszam =" . $cikksorszam . " ".$nyelvszures."");
			$query = "SELECT tartalom, cim, archiv, php_file, bevezeto, hivatkozas, menucsoport, nyelv, menu_fent, hir,
			   kiemelt, menunev, sorszam, kelt, megjelenes, esemeny, esemeny_ig, php_file, sorrend
			   FROM ".$_SESSION[adatbazis_etag]."_szoveg
			   WHERE sorszam =" . $cikksorszam . " ".$nyelvszures."";
        } else {
		   $r = mysql_query("SELECT tartalom, cim, archiv, php_file, bevezeto, hivatkozas, menucsoport, nyelv, menu_fent, hir,
			  kiemelt, menunev, sorszam, kelt, megjelenes, esemeny, esemeny_ig, php_file, sorrend
			  FROM ".$_SESSION[adatbazis_etag]."_szoveg
			  WHERE hivatkozas ='" . $cikksorszam . "' ".$nyelvszures."");
		   $query = "SELECT tartalom, cim, archiv, php_file, bevezeto, hivatkozas, menucsoport, nyelv, menu_fent, hir,
			  kiemelt, menunev, sorszam, kelt, megjelenes, esemeny, esemeny_ig, php_file, sorrend
			  FROM ".$_SESSION[adatbazis_etag]."_szoveg
			  WHERE hivatkozas ='" . $cikksorszam . "' ".$nyelvszures."";
        }
		
		$a = mysql_fetch_row($r);
		#$result = $adat->kapcsolat->query($query);
		#$a = $result->fetch;
		$cikkszoveg = $a[0];
		$cikkarchiv = $a[2];
		$cikkphp = $a[3];
        $cikkbevezeto = $a[4];
        $cikkhivatkozas = $a[5];
        $cikkmenucsoport = $a[6];
		
		$this->tartalom = $a[0];
		$this->archiv = $a[2];
		$this->cim = $a[1];
		$this->bevezeto = $a[4];
		$this->nyelv = $a[7];
		$this->menufent = $a[8];
		$this->hir = $a[9];
		$this->kiemelt = $a[10];
		$this->menunev = $a[11];
		$this->sorszam = $a[12];
		$this->kelt = $a[13];
		$this->megjelenes = $a[14];
		$this->esemeny = $a[15];
		$this->esemeny_ig = $a[16];
		$this->php_file = $a[17];
		$this->sorrend = $a[18];
		$this->cikksorszam = $cikksorszam;
        $this->bevezeto = $cikkbevezeto;
        $this->hivatkozas = $cikkhivatkozas;
        $this->menucsoport = $cikkmenucsoport;
		if ($cikkarchiv == 1){
			$this->html_code= '
			<h2 class="lapcim">Hiba történt!</h2>
			<div class="szovegblokk">
				A keresett oldal nem található!
			</div>';
		}
		
		
		}
		
	function mysql_update($sorszam){
		   if ($_POST[check_menu] == 'on'){
		   $ment_menu = 1;}
		else {
			$ment_menu = 0;}
		if ($_POST[check_hir] == 'on'){
		   $ment_hir = 1;}
		else {$ment_hir = 0;}
		if ($_POST[check_aktiv] == 'on'){
		   $ment_aktiv = 0;}
		else {$ment_aktiv = 1;}
        if ($_POST[check_kiemelt] == 'on'){
		   $ment_kiemelt = 1;}
		else {$ment_kiemelt = 2;}
		
		$sql2 = "UPDATE ".$_SESSION[adatbazis_etag]."_szoveg SET
			tartalom='$_POST[content]', bevezeto='$_POST[bevezeto]', cim='$_POST[cim]', menunev='$_POST[menunev]',
			sorrend='$_POST[sorrend]', nyelv='$_POST[cikk_nyelv]', archiv='$ment_aktiv', menuhely='$ment_menu', menu_fent='$ment_menu', hir='$ment_hir',
			kiemelt='$ment_kiemelt', kategoria='$ment_hir', megjelenes='$_POST[megjelenes]', kelt='$_POST[kelt]',
			esemeny='$_POST[esemeny]', esemeny_ig='$_POST[esemeny_ig]', php_file='$_POST[php_file]', cikkszam='$_POST[cikkszam]',
			hivatkozas='$_POST[hivatkozas]', profil='$_POST[profil]' WHERE sorszam='$sorszam'";
	
	mysql_query($sql2);
		}
		
	
	function mysql_insert(){
		   $result = mysql_query("SELECT MAX(sorrend) FROM ".$_SESSION[adatbazis_etag]."_szoveg");
			$row = mysql_fetch_array($result); 
			$num_sorrend=$row[0];
			$num_sorrend++;
			$idopont = date("Y-m-d H:i:s");

			$result = "INSERT INTO ".$_SESSION[adatbazis_etag]."_szoveg  
				(sorrend, archiv, nyelv, cim, kelt, megjelenes)
				VALUES
				($num_sorrend, '1', '$_SESSION[lang]', '$_POST[ujcim]', '$idopont', '$idopont')";
			mysql_query($result);
		}
		
	function mysql_delete($sorszam){
		   $result = "DELETE FROM ".$_SESSION[adatbazis_etag]."_szoveg WHERE sorszam = $sorszam LIMIT 1";
			mysql_query($result);
		}
		
	}


class slide{
   public $sorszam;
   public $kep;
   public $focim;
   public $focim_hu;
   public $focim_en;
   public $focim_de;
   public $leiras;
   public $leiras_en;
   public $leiras_de;
   public $aktiv;
   public $slide;
   public $profil;
   public $sorrend;
   
   function mysql_read($sorszam){
	  $result = mysql_query("SELECT sorszam, slide, focim_hu, focim_en, focim_de, leiras_hu, leiras_en, leiras_de, aktiv, link, sorrend, profil FROM ".$_SESSION[adatbazis_etag]."_slideshow WHERE sorszam =$sorszam");
	  $r = mysql_fetch_assoc($result);
	  $this->sorszam = $r['sorszam'];
	  $this->slide = $r['slide'];
	  $this->focim = $r['focim_'.$_SESSION[lang]];
	  $this->leiras = $r['leiras_'.$_SESSION[lang]];
	  $this->focim_hu = $r['focim_hu'];
	  $this->focim_en = $r['focim_en'];
	  $this->focim_de = $r['focim_de'];
	  $this->leiras_hu = $r['leiras_hu'];
	  $this->leiras_en = $r['leiras_en'];
	  $this->leiras_de = $r['leiras_de'];
	  $this->link = $r['link'];
	  $this->sorrend = $r['sorrend'];
	  $this->aktiv = $r['aktiv'];
	  $this->profil = $r['profil'];
   }
   
   function mysql_check($sorszam, $lista=''){
	  if ($lista == 'lista'){$lista = '_'.$sorszam;}
	  if ($_REQUEST['aktiv'.$lista] == 'on'){
		 $this->aktiv = 1;}
	  else {
		 $this->aktiv = 0;
	  }
	  
	  $this->focim_hu = $_REQUEST['focim_hu'.$lista];
	  $this->focim_en = $_REQUEST['focim_en'.$lista];
	  $this->focim_de = $_REQUEST['focim_de'.$lista];
	  $this->leiras_hu = $_REQUEST['leiras_hu'.$lista];
	  $this->leiras_en = $_REQUEST['leiras_en'.$lista];
	  $this->leiras_de = $_REQUEST['leiras_de'.$lista];
	  $this->link = $_REQUEST['link'.$lista];
	  $this->sorrend = $_REQUEST['sorrend'.$lista];
	  $this->profil = $_REQUEST['profil'.$lista];
	  
   }
   
   function mysql_update($sorszam){
	  
	  $result_termek = "UPDATE ".$_SESSION[adatbazis_etag]."_slideshow SET 
					focim_hu='$this->focim_hu', 
					focim_en='$this->focim_en',
					focim_de='$this->focim_de', 
					leiras_hu='$this->leiras_hu',
					leiras_en='$this->leiras_en',
					leiras_de='$this->leiras_de',
					link='$this->link',
					aktiv='$this->aktiv',
					profil='$this->profil',
					sorrend='$this->sorrend'
					WHERE sorszam='$sorszam'";
		mysql_query($result_termek);
		
   }
   
   function mysql_delete($sorszam){
	  $sql = "DELETE FROM ".$_SESSION[adatbazis_etag]."_slideshow WHERE sorszam = $sorszam";
	  mysql_query($sql);
	  unlink("slider/".$sorszam.'.jpg');
   }
}

class termek{
   public $id;
   public $nev;
   public $szoveg;
   public $kategoria;
   public $kategoria_felirat;
   var $kepek = array();
   var $letoltesek = array();
   var $jellemzok = array();
   
   function load($id){
	  $result = mysql_query("SELECT id, nev_hu, nev_en, nev_ro, szoveg_hu, szoveg_en, szoveg_ro, kategoria
			  FROM ".$_SESSION[adatbazis_etag]."_termekek
			  WHERE hivatkozas ='$id'");
	  $r = mysql_fetch_assoc($result);
	  
	  $kat_keres = $r['kategoria'];
	  $result2 = mysql_query("SELECT kategorianev_hu, kategorianev_en, kategorianev_ro FROM ".$_SESSION[adatbazis_etag]."_kategoriak WHERE id='$kat_keres'");
	  $rr = mysql_fetch_assoc($result2);
	  
	  
	  $this->id = $r['id'];
	  $this->nev = $r['nev_'.$_SESSION[lang]];
	  $this->szoveg = $r['szoveg_'.$_SESSION[lang]];
	  $this->kategoria = $r['kategoria'];
	  $this->kategoria_felirat = str_replace("mérlegek", "mérleg", $rr['kategorianev_'.$_SESSION[lang]]);
	  
	  $result = mysql_query("SELECT tj.id, tj.jellemzo_ertek_hu, j.jellemzo_hu, j.egyseg_hu
			  FROM ".$_SESSION[adatbazis_etag]."_termek_jellemzok AS tj
			  LEFT JOIN ".$_SESSION[adatbazis_etag]."_jellemzok AS j
			  ON tj.id_jellemzo = j.id
			  WHERE tj.id_termek = '$this->id'");
	  
	  $i = 1;
	  while ($next_element = mysql_fetch_array($result)){	
		 $i++;
		 if ($this->jellemzok[($i-1)]['jellemzo'] == $next_element['jellemzo_hu']){
			$x = 'ok';
			$this->jellemzok[$i-1]['ertek_td'] = '<td>'.$this->jellemzok[($i-1)]['ertek'].' '.$this->jellemzok[($i-1)]['egyseg'].'</td><td>'.$next_element['jellemzo_ertek_hu'].' '.$next_element['egyseg_hu'].'</td>';
		 }
		
		if ($x != 'ok'){
		 $this->jellemzok[$i]['jellemzo'] = $next_element['jellemzo_hu'];
		 $this->jellemzok[$i]['ertek'] = $next_element['jellemzo_ertek_hu'];
		 $this->jellemzok[$i]['egyseg'] = $next_element['egyseg_hu'];
		 $this->jellemzok[$i]['ertek_td'] = '<td colspan="2">'.$next_element['jellemzo_ertek_hu'].' '.$next_element['egyseg_hu'].'</td>'; 
		}
		unset($x);
	  }
	  
	  $result = mysql_query("SELECT id, file FROM ".$_SESSION[adatbazis_etag]."_termek_kepek WHERE termek_id = '$this->id'");
	  while ($next_element = mysql_fetch_array($result)){		
		$this->kepek[$next_element['id']] = 'images_termekek/'.$next_element['file'];
	  }
	  
	  $result = mysql_query("SELECT id, file, type, title_hu FROM ".$_SESSION[adatbazis_etag]."_termek_letoltesek WHERE termek_id = '$this->id'");
	  while ($next_element = mysql_fetch_array($result)){		
		$this->letoltesek[$next_element['id']]['file'] = 'files_termekek/'.$next_element['file'];
		$this->letoltesek[$next_element['id']]['type'] = $next_element['type'];
		$this->letoltesek[$next_element['id']]['title'] = $next_element['title_hu'];
	  }
   }
}