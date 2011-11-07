<?php
	/*

	w3captcha - php-скрипт для генерации изображений CAPTCHA
	версия: 1.1 от 08.02.2008
	разработчики: http://w3box.ru
	тип лицензии: freeware
	w3box.ru © 2008

	*/
	$count=$_GET['w3_count'];	/* количество символов */
	$width=$_GET['w3_width']; /* ширина картинки */
	$height=$_GET['w3_height']; /* высота картинки */
	$font_size_min=$_GET['w3_font_size_min']; /* минимальная высота символа */
	$font_size_max=$_GET['w3_font_size_max']; /* максимальная высота символа */
	$font_file="../style/Comic_Sans_MS.ttf"; /* путь к файлу относительно w3captcha.php */
	$char_angle_min=-$_GET['w3_char_angle_min']; /* максимальный наклон символа влево */
	$char_angle_max=$_GET['w3_char_angle_max'];	/* максимальный наклон символа вправо */
	$char_angle_shadow=$_GET['w3_char_angle_shadow'];	/* размер тени */
	$char_align=$_GET['w3_char_align'];	/* выравнивание символа по-вертикали */
	$start=$_GET['w3_start'];	/* позиция первого символа по-горизонтали */
	$interval=$_GET['w3_interval'];	/* интервал между началами символов */
	$chars=$_GET['w3_chars']; /* набор символов */
	$noise=$_GET['w3_noise']; /* уровень шума */


	$colour=$_GET['w3_backg'];
	if ( strlen( $colour ) == 6 )
		list( $r, $g, $b ) = array( $colour[0].$colour[1], $colour[2].$colour[3], $colour[4].$colour[5] );
	elseif ( strlen( $colour ) == 3 )
		list( $r, $g, $b ) = array( $colour[0].$colour[0], $colour[1].$colour[1], $colour[2].$colour[2] );
	else
		return false;

    $backg_r = hexdec( $r );
	$backg_g = hexdec( $g );
	$backg_b = hexdec( $b );
	
	$colour=$_GET['w3_shadow'];
	if ( strlen( $colour ) == 6 )
	  list( $r, $g, $b ) = array( $colour[0].$colour[1], $colour[2].$colour[3], $colour[4].$colour[5] );
	elseif ( strlen( $colour ) == 3 )
	  list( $r, $g, $b ) = array( $colour[0].$colour[0], $colour[1].$colour[1], $colour[2].$colour[2] );
	else
	  return false;

	$shadow_r = hexdec( $r );
	$shadow_g = hexdec( $g );
	$shadow_b = hexdec( $b );

	$image=imagecreatetruecolor($width, $height);
	$background_color=imagecolorallocate($image, $backg_r, $backg_g , $backg_b); /* rbg-цвет фона */
	$font_color=imagecolorallocate($image, $shadow_r, $shadow_g, $shadow_b); /* rbg-цвет тени */
		
	imagefill($image, 0, 0, $background_color);

	$str="";

	$num_chars=strlen($chars);
	for ($i=0; $i<$count; $i++)
	{
		$char=$chars[rand(0, $num_chars-1)];
		$font_size=rand($font_size_min, $font_size_max);
		$char_angle=rand($char_angle_min, $char_angle_max);
		imagettftext($image, $font_size, $char_angle, $start, $char_align, $font_color, $font_file, $char);
		imagettftext($image, $font_size, $char_angle+$char_angle_shadow*(rand(0, 1)*2-1), $start, $char_align, $background_color, $font_file, $char);
		$start+=$interval;
		$str.=$char;
	}

	if ($noise)
	{
		for ($i=0; $i<$width; $i++)
		{
			for ($j=0; $j<$height; $j++)
			{
				$rgb=imagecolorat($image, $i, $j);
				$r=($rgb>>16) & 0xFF;
				$g=($rgb>>8) & 0xFF;
				$b=$rgb & 0xFF;
				$k=rand(-$noise, $noise);
				$rn=$r+255*$k/100;
				$gn=$g+255*$k/100;		
				$bn=$b+255*$k/100;
				if ($rn<0) $rn=0;
				if ($gn<0) $gn=0;
				if ($bn<0) $bn=0;
				if ($rn>255) $rn=255;
				if ($gn>255) $gn=255;
				if ($bn>255) $bn=255;
				$color=imagecolorallocate($image, $rn, $gn, $bn);
				imagesetpixel($image, $i, $j , $color);					
			}
		}
	}
	session_start();
	$_SESSION["thethe_captcha"]=$str;
	if (function_exists("imagepng"))
	{
		header("Content-type: image/png");
		imagepng($image);
	}
	elseif (function_exists("imagegif"))
	{
		header("Content-type: image/gif");
		imagegif($image);
	}
	elseif (function_exists("imagejpeg"))
	{
		header("Content-type: image/jpeg");
		imagejpeg($image);
	}

	imagedestroy($image);
?>
