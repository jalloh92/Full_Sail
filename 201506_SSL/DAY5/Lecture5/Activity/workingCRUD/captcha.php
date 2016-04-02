<?php

    //ini_set('session.gc_maxlifetime', 5 * 60);
    session_start();
	session_regenerate_id();

/*
 *	==================================
 *	PROJECT:	SSL - Day 5
 *	FILE:		FULL CRUD - Class Analysis (captcha.php)
 *	AUTHOR: 	Fialishia O. (Updated 1506)
 *	==================================
 */


	$file = file('files/dictionary.txt', FILE_IGNORE_NEW_LINES);

	// $fileArray = preg_split('/\s+/', $file);
	// echo $fileArray[0];

    // Setup Length & Random Number
	$length = count($file)-1;
	$random = rand(0, $length);

	// echo $file[$random];
	$_SESSION['captcha'] = $file[$random];
	session_write_close();


function msg($msg){
	$container = imagecreate(250, 170);
	$black = imagecolorallocate($container, 0, 0, 0);
	$white = imagecolorallocate($container, 255, 255, 255);
	$font = '/Library/Fonts/Arial.ttf';
	imagefilledrectangle($container, 0, 0, 250, 170, $black);	

	$px  = (imagesx($container) / (strlen($msg)/1.15));
	$py  = (imagesy($container) / 3.5);


	imagefttext($container, 28, -27, $px, $py, $white, $font, $msg);
	header("Content-type: image/png");
	imagepng($container, null);
	imagedestroy($container);
}

msg($file[$random]);

?>