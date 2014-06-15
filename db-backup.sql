DROP TABLE merlegek_szotar;

CREATE TABLE `merlegek_szotar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `de` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ro` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `megjegyzes` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO merlegek_szotar VALUES("1","akcióink","specials","specials","speciale","menüelem");
INSERT INTO merlegek_szotar VALUES("2","referenciáink","references","","referințe","menüelem");
INSERT INTO merlegek_szotar VALUES("4","termékeink","products","","produse","menüelem");
INSERT INTO merlegek_szotar VALUES("5","szolgáltatásaink","services","","servicii","menüelem");
INSERT INTO merlegek_szotar VALUES("6","Írja be a nevét","Enter your name","","Introduceți numele dvs.","kapcsolat űrlap");
INSERT INTO merlegek_szotar VALUES("7","E-mail címe","E-mail address","","Adresa de e-mail","kapcsolat űrlap");
INSERT INTO merlegek_szotar VALUES("8","Telefonszáma","phone Number","","Numărul de telefon","kapcsolat űrlap");
INSERT INTO merlegek_szotar VALUES("9","Üzenet","message","","mesaj","kapcsolat űrlap");
INSERT INTO merlegek_szotar VALUES("10","Kérek másolatot","Send me a copy","","Trimite-mi o copie","kapcsolat űrlap");
INSERT INTO merlegek_szotar VALUES("11","Biztonsági kód","security Code","","Cod de securitate","kapcsolat űrlap");
INSERT INTO merlegek_szotar VALUES("12","Ide írja be a kódot!","Enter the code!","","Introduceți codul!","kapcsolat űrlap");
INSERT INTO merlegek_szotar VALUES("13","elküld","send","","trimite","kapcsolat űrlap");
INSERT INTO merlegek_szotar VALUES("14","első","first","","első","");
INSERT INTO merlegek_szotar VALUES("15","termékcsoportok","product groups","","grupuri de produse","");
INSERT INTO merlegek_szotar VALUES("16","szolgáltatások","services","","servicii","");
INSERT INTO merlegek_szotar VALUES("17","információk","informations","","informații","");
INSERT INTO merlegek_szotar VALUES("18","Kérdezze munkatársunkat!","Ask our employees!","","Adresați-vă angajații noștri!","");
INSERT INTO merlegek_szotar VALUES("19","keresés","search","","căutare","");
INSERT INTO merlegek_szotar VALUES("20","Mit szeretne megmérni?","What do you want to measure?","","Ce vrei să măsoare?","");
INSERT INTO merlegek_szotar VALUES("21","kapcsolat","contact","","contact","");
INSERT INTO merlegek_szotar VALUES("22","Leírás","","","","");
INSERT INTO merlegek_szotar VALUES("23","Adatok/árak","","","","");
INSERT INTO merlegek_szotar VALUES("24","Képgaléria","","","","");
INSERT INTO merlegek_szotar VALUES("25","Letöltések","","","","");



