<?php
/*
Miniature PHP captcha
`````````````````````
Usage:
 captcha_png.php?key={a key}
 Displays a .png showing substr(md5(key),0,4)

Example captcha:
 $key = {random key}
 define SALT
 
 <img src="captcha_png.php?key=".$key 
 <input type="text" name="verification" />
 <input type="hidden" name="expected" val=" md5(SALT . substr(md5(key),0,4) )

 To validate, test to see if md5(SALT. verification) == expected.
*/
	
$phrase = 'invalid';
if (isset($_GET['key'])) $phrase = substr(md5($_GET['key']),0,4);
$font = 'http://claire.ws/jura.ttf';
$im = @imagecreate(80, 15);
// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 14, $black);
$font = 'jura.ttf';
imagettftext($im, 16, 0, 11, 14, $grey, $font, $phrase);
imagettftext($im, 16, 0, 10, 14, $white, $font, $phrase);
header('Content-type: image/png'); 
imagepng($im); 

imagedestroy($im);
