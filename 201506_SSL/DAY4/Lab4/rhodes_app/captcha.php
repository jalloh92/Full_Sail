<?php

ini_set('session.gc_maxlifetime', 86400); //controls the max amount of time for sessions
//Set at 86,400 seconds, a user should be able to browse your application for 24 hours before
// needing to re-authenticate their session.
session_start();
session_regenerate_id();

// define variables
$file = file('files/dictionary.txt', FILE_IGNORE_NEW_LINES);
$length = count($file)-1;
$random = rand(0, $length);
$_SESSION['captcha'] = $file[$random];
session_write_close();

// function to display message
function msg($msg){
    $container = imagecreate(250,170);
    $black = imagecolorallocate($container, 0, 0,0);
    $white = imagecolorallocate($container, 255,255,255);
    $font = '/Library/Fonts/Arial.ttf';
    imagefilledrectangle($container, 0, 0, 250, 170, $black);

    $px  = (imagesx($container) / (strlen($msg)/1.15));
    $py  = (imagesy($container) / 3.5);

    imagefttext($container, 28, -27, $px, $py, $white, $font, $msg);
    header("Content-type: image/png");
    imagepng($container, null);
    imagedestroy($container);
}

// Invoke function msg calling a random file
msg($file[$random]);


?>