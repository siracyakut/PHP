<?php

$pin = imagecreatefrompng("pin.png");
$img = imagecreatefromjpeg("map_full.jpg");


if(isset($_GET["x"]) && isset($_GET["y"]))
{
	$x = (int)$_GET["x"] / 3.90;
	$y = (int)$_GET["y"] / 3.90;

	$x = $x + 768;
	$y = -($y - 768);

	imagecopy($img, $pin, $x - 20, $y - 40, 0, 0, imagesx($pin), imagesy($pin));
}

header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);

?>