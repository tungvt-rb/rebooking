<?php

	$width		= 120;
	$height		= 34;
	$image 		= @imagecreate($width, $height) or die('Cannot initialize GD!');
	for( $i=0; $i<20; $i++ ) {
		imageline(
			$image, 
			mt_rand(0,$width), mt_rand(0,$height), 
			mt_rand(0,$width), mt_rand(0,$height), 
			imagecolorallocate(
				$image,
				mt_rand(150,255), 
				mt_rand(150,255), 
				mt_rand(150,255)
			)
		);
	}
	$baseList = '0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$length = 5;
	$black = imagecolorallocate($image, 0, 0, 0);
	for( $i=0, $x=0; $i<$length; $i++ ) {
		$actChar = substr($baseList, rand(0, strlen($baseList)-1), 1);
		imagechar($image, 5, $i*15 + 30, 8, $actChar, $black);
		$code .= $actChar;
	}
	header('Content-Type: image/jpeg');
	imagejpeg($image);
	imagedestroy($image);
	$_SESSION['secure_code'] = $code;