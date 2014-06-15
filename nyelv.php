<?php

$domain = $_SERVER['HTTP_HOST'];

if (($_REQUEST['menu'] == 'magyar') OR ($_REQUEST['menu'] == 'romana') OR ($_REQUEST['menu'] == 'english')){
	if ($_REQUEST['menu'] == 'magyar'){ $_SESSION["lang"] = 'hu';}
	if ($_REQUEST['menu'] == 'romana'){ $_SESSION["lang"] = 'ro';}
	if ($_REQUEST['menu'] == 'english'){ $_SESSION["lang"] = 'en';}
} else {
	if ($_SESSION["lang"] == ''){
		$_SESSION["lang"] = 'hu';
	}
}

$result = mysql_query("SELECT hu, en, de, ro FROM ".$_SESSION[adatbazis_etag]."_szotar");
#$query = "SELECT hu, en, de, ro FROM ".$_SESSION[adatbazis_etag]."_szotar";
#$result = $kapcsolat->query($query);
while ($next_element = mysql_fetch_array($result)){
   $hu = $next_element['hu'];
   $nyelv = $_SESSION[lang];
   $lang[$hu] = $next_element[$nyelv];
}
 
if (($_SESSION["lang"] == 'hu') OR ($_SESSION["lang"] == '')){
   $lang[keywords] = 'fogászat, implantáció, szájsebészet, diagnosztika, parodontológia, altatásos fogászat, ózonterápia';
	$lang[cnc_megmunkalasok] = 'cnc megmunkálások';
	$lang[felepitmenygyartas] = 'felépítmény&shy;gyártás';
	$lang[hirek] = 'hírek';
   $lang[vezeteknev] = 'Vezetéknév';
	$lang[keresztnev] = 'Keresztnév';
	$lang[ganalytics_nyelv] = 'ganalytics_hu.js';
	$lang[domain] = 'premiumdental.hu';
	$lang[head_lang] = 'hu';
	$lang[head_xml] = 'hu';
	$lang[cim] = 'cím';
	$lang[ugyfelfogadas] = 'Ügyfélfogadás';
	$lang[idopontfoglalas] = 'időpontfoglalás';
	$lang[hetfo] = 'hétfő';
	$lang[kedd] = 'kedd';
	$lang[szerda] = 'szerda';
	$lang[csutortok] = 'csütörtök';
	$lang[pentek] = 'péntek';
	$lang[szombat] = 'szombat';
	$lang[vasarnap] = 'vasárnap';
	$lang[uzenetkuldese] = 'Üzenet küldése';
	$lang[uzenetgomb] = 'Elküld';
	$lang[uzenet] = 'Üzenet';
	$lang[tema] = 'Téma';
	$lang[orvos_valaszol] = 'Orvos válaszol';
	$lang[emailcime] = 'Az Ön e-mail címe:';
	$lang[uzenetigazolas] = 'Üzenetét megkaptuk, hamarosan válaszolunk!';
	$lang[frissitve] = 'Utolsó frissítés: <br />'.$maxfrissitve;
	$lang[bovebben] = 'Bővebben';
	$lang[nincskerdes] = 'A témában még nem érkezett kérdés!';
	$lang[orvosvalasza] = 'Az orvos válasza';
	$lang[tegyefelkerdeset] = 'Tegye fel kérdését a szakterület specialistájának!';
	$lang[korabbikerdesek] = 'Korábbi kérdések';
	$lang[vissza] = 'VISSZA';
	
	$lang[tanacsok] = 'Hasznos tanácsok';
	$lang[orvosaink] = 'Orvosaink';
	$lang[szolgaltatasok] = 'Szolgáltatások';
	$lang[kerdesekvalaszok] = 'Kérdések és válaszok';
	$lang[arak] = 'Irányadó árak';
	$lang[galeria] = 'Galéria';
	$lang[kereses] = 'Keresés';
	$lang[altalanos_fogaszat] = 'Általános fogászat';
	$lang[altatasos_fogaszat] = 'Altatásos fogászat';
	$lang[bejelentkezes] = 'Bejelentkezés';
	$lang[kapcsolat] = 'Kapcsolat';
	$lang[fogorvos_valaszol] = 'Fogorvos válaszol';
	$lang[mehet] = 'MEHET';
	$lang[azonosito] = 'Azonosító';
	$lang[jelszo] = 'Jelszó';
	$lang[regisztracio] = 'Regisztráció';
	$lang[elfelejtett_jelszo] = 'Elfelejtett jelszó';
	$lang[email] = 'E-mail';
	$lang[kerdes] = 'Kérdés';
	$lang[kereses_eredmenye] = 'A keresés eredménye';
	$lang[talalatazoldalakon] = 'Találat az alábbi oldalakon';
	$lang[keresettkifejezes] = 'Keresett kifejezés';
	$lang[nincstalalat] = 'Nincs találat!';
	$lang[idopontfoglalas] = 'Időpontfoglalás';
	$lang[telefon] = 'Telefon';
	$lang[lablec] = '©2013 KÚTVÖLGYI PREMIUM DENTAL<br />
	1125 Budapest, Kútvölgyi út 4. | Tel: 1 225 33 34 | E-mail: <a href="mailto:klara.csabay@premiumdental.hu">info@premiumdental.hu</a>';
	$lang[megvalaszolt_kerdesek] = 'Megválaszolt kérdések';
	$lang[kerdes_hozzajarulas] = 'Hozzájárulok a kérdés megjelenítéséhez a weboldalon';
	$lang[terkep_es_elerhetoseg] = 'Térkép és elérhetőség';
	$lang[hivjon_skype_on] = 'Hívjon Skype-on!';
	$lang[facebook] = 'Facebook';
	
	//email
	$lang[idopontuzenet] ='időpont üzenet';
	$lang[uzenetet_kuldte] ='A '.$lang[domain].' weboldalra az alábbi üzenetet küldte';
	$lang[kuldoemailcime] ='Küldő email címe:';
	$lang[kuldotelefonszama] ='Küldő telefonszáma';
	$lang[koszonjukvalaszolunk] ='Köszönjük, hamarosan válaszolunk!';
	$lang[premiumcsapat] = 'a <a href="http://www.'.$lang[domain].'">'.$lang[domain].'</a> csapata';
	$lang[uzenet_erkezett] = 'A '.$lang[domain].' weboldalra az alábbi üzenet érkezett';
	$lang[uzenetelkuldve] = 'Az üzenet elküldve!';
	$lang[orvosvalaszoluzenet] = 'Orvos válaszol üzenet';
	$lang[biztonsagi_ellenorzes] = 'Biztonsági ellenőrzés';
	$lang[az_eredmeny_hibas] = 'Az eredmény hibás, próbálja újra!';
	$lang[irja_be_az_eredmenyt] = 'Írja be a művelet eredményét!';
	$lang[ide_irja_az_eredmenyt] = 'Ide írja be az eredményt!';
	
}

if ($_SESSION["lang"] == 'en'){
   $lang[vezeteknev] = 'Last name';
	$lang[keresztnev] = 'First name';
	$lang[head_lang] = 'en';
	$lang[head_xml] = 'en';
	$lang[cim] = 'address';
	$lang[ugyfelfogadas] = 'opening hours';
	$lang[idopontfoglalas] = 'Registration';
	$lang[ugyvediiroda] = '<h1>Rácz Law Firm</h1>';
	$lang[hetfo] = 'monday';
	$lang[kedd] = 'tuesday';
	$lang[szerda] = 'wednesday';
	$lang[csutortok] = 'thursday';
	$lang[pentek] = 'friday';
	$lang[szombat] = 'saturday';
	$lang[vasarnap] = 'sunday';
	$lang[uzenetkuldese] = 'Send a message';
	$lang[uzenetgomb] = 'Send';
	$lang[uzenet] = 'Message';
	$lang[tema] = 'Topic';
	$lang[orvos_valaszol] = 'Doctor responds';
	$lang[emailcime] = 'Your e-mail:';
	$lang[uzenetigazolas] = 'Your message has been received, answer soon!';
	$lang[frissitve] = 'last update: <br />'.$maxfrissitve;
	$lang[bovebben] = 'more';
	$lang[nincskerdes] = 'This topic has not yet been reviewed!';
	$lang[orvosvalasza] = 'The doctor\'s response';
	$lang[tegyefelkerdeset] = 'Ask a question about this specialist field!';
	$lang[tegyefelkerdeset] = 'Ask the specialist!';
	$lang[korabbikerdesek] = 'Previous issues';
	$lang[vissza] = 'BACK';
	
	$lang[tanacsok] = 'Helpful Hints';
	$lang[orvosaink] = 'Doctors';
	$lang[kerdesekvalaszok] = 'Questions and Answers';
	$lang[arak] = 'Prices';
	$lang[galeria] = 'Photo Gallery';
	$lang[kereses] = 'Search';
	$lang[altalanos_fogaszat] = 'General dentistry';
	$lang[altatasos_fogaszat] = 'Dental anesthetics';
	$lang[bejelentkezes] = 'Login';
	$lang[kapcsolat] = 'Contact';
	$lang[fogorvos_valaszol] = "Dentist's response";
	$lang[mehet] = 'OK';
	$lang[azonosito] = 'User';
	$lang[jelszo] = 'Password';
	$lang[regisztracio] = 'Registration';
	$lang[elfelejtett_jelszo] = 'Forgotten password';
	$lang[email] = 'E-mail';
	$lang[kerdes] = 'Question';
	$lang[kereses_eredmenye] = 'Search results';
	$lang[talalatazoldalakon] = 'Found on the following pages';
	$lang[keresettkifejezes] = 'Search keyword';
	$lang[nincstalalat] = 'No results!';
	$lang[szolgaltatasok] = 'Services';
	$lang[telefon] = 'Phone';
	$lang[lablec] = '©2013 KÚTVÖLGYI PREMIUM DENTAL<br />
	H-1125 Budapest, Kútvölgyi út 4. | Tel: +36 1 225 33 34 | E-mail: <a href="mailto:klara.csabay@premiumdental.hu">info@premiumdental.hu</a>';
	$lang[megvalaszolt_kerdesek] = 'Questions answered';
	$lang[kerdes_hozzajarulas] = 'I agree, the question to display the webpage';
	$lang[terkep_es_elerhetoseg] = 'Map and contacts';
	$lang[hivjon_skype_on] = 'Call us on Skype!';
	$lang[facebook] = 'Facebook';
	
	//email
	$lang[idopontuzenet] ='date of reservation';
	$lang[uzenetet_kuldte] ='The message was sent to the following website '.$lang[domain].'';
	$lang[kuldoemailcime] ='Sender Email Address:';
	$lang[kuldotelefonszama] ='Sender\'s phone number';
	$lang[koszonjukvalaszolunk] ='Thank you! We will respond soon!';
	$lang[premiumcsapat] = '<a href="http://www.'.$lang[domain].'">'.$lang[domain].'</a> team';
	$lang[uzenet_erkezett] = 'The following message received here from '.$lang[domain].'';
	$lang[uzenetelkuldve] = 'The message has been sent!';
	$lang[biztonsagi_ellenorzes] = 'Security check';
	$lang[az_eredmeny_hibas] = 'The result is incorrect, please try again!';
	$lang[irja_be_az_eredmenyt] = 'Enter the calculation result!';
	$lang[ide_irja_az_eredmenyt] = 'Enter the result of calculation!';

}