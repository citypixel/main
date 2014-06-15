<?php
session_start();
header("Content-type: image/jpeg");
 
$im=imagecreatetruecolor(95,35);
 
$hatter=imagecolorallocate($im,255,255,255);
$betu=imagecolorallocate($im,226,0,26);
$szurke=imagecolorallocate($im,125,125,125);

$chars="abcdefhjkmnpqrstuxy345789";
$str="";
for ($i=0;$i<4;$i++){
	$rand=rand(0,strlen($chars)-1);
	$str.=$chars[$rand];
}

$_SESSION["captcha"]=$str;

imagefill($im,0,0,$hatter);
#betumeret, dőlésszög, x, y koordináták
imagettftext($im,27,7,10,32,$szurke,"./mufferaw.ttf",$str);
imagettftext($im,27,7,9,30,$betu,"./mufferaw.ttf",$str);

imagejpeg($im);
imagedestroy($im);