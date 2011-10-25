<?php
/**
	 * PHP MATH CAPTCHA
	 * Copyright (C) 2010  Constantin Boiangiu  (http://www.php-help.ro)
	 * 
	 * This program is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 * 
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 * 
	 * You should have received a copy of the GNU General Public License
	 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
	 **/

	/**
	 * @author Constantin Boiangiu
	 * @link http://www.php-help.ro
	 * 
	 * This script is provided as-is, with no guarantees.
	 */
	
	/*===============================================================
		General captcha settings
	  ===============================================================*/
	// captcha width
	$captcha_w = $_GET['math_captcha_w'];
	// captcha height
	$captcha_h = $_GET['math_captcha_h'];
	// minimum font size; each operation element changes size
	$min_font_size =  $_GET['math_min_font_size'];
	// maximum font size
	$max_font_size = $_GET['math_max_font_size'];
	// rotation angle
	$angle = $_GET['math_angle'];
	// background grid size
	$bg_size = $_GET['math_bg_size'];
	// path to font - needed to display the operation elements
	$font_path = '../style/courbd.ttf';
	// array of possible operators
	if ($_GET['math_operators_plus'])$mas[]='+';
	if ($_GET['math_operators_sub'])$mas[]='-';
	if ($_GET['math_operators_mu'])$mas[]='*';
	if ($_GET['math_operators_di'])$mas[]='/';
	$operators=$mas;
	// first number random value; keep it lower than $second_num
	$first_num = rand($_GET['math_first_num_1'],$_GET['math_first_num_2']);
	// second number random value
	$second_num = rand($_GET['math_second_num_1'],$_GET['math_second_num_2']);
		
	/*===============================================================
		From here on you may leave the code intact unless you want
		or need to make it specific changes. 
	  ===============================================================*/
	
	shuffle($operators);
	$expression = $second_num.$operators[0].$first_num;
	/*
		operation result is stored in $session_var
	*/
	eval("\$session_var=".$second_num.$operators[0].$first_num.";");
	/* 
		save the operation result in session to make verifications
	*/
	session_start();
	$_SESSION['security_number'] = $session_var;
	/*
		start the captcha image
	*/
	$img = imagecreate( $captcha_w, $captcha_h );
	/*
		Some colors. Text is $black, background is $white, grid is $grey
	*/
	$colour=$_GET['math_backg'];
	if ( strlen( $colour ) == 6 )
		list( $r, $g, $b ) = array( $colour[0].$colour[1], $colour[2].$colour[3], $colour[4].$colour[5] );
	elseif ( strlen( $colour ) == 3 )
		list( $r, $g, $b ) = array( $colour[0].$colour[0], $colour[1].$colour[1], $colour[2].$colour[2] );
	else
		return false;

    $backg_r = hexdec( $r );
	$backg_g = hexdec( $g );
	$backg_b = hexdec( $b );
	
	$colour=$_GET['math_text'];
	if ( strlen( $colour ) == 6 )
		list( $r, $g, $b ) = array( $colour[0].$colour[1], $colour[2].$colour[3], $colour[4].$colour[5] );
	elseif ( strlen( $colour ) == 3 )
		list( $r, $g, $b ) = array( $colour[0].$colour[0], $colour[1].$colour[1], $colour[2].$colour[2] );
	else
		return false;

    $text_r = hexdec( $r );
	$text_g = hexdec( $g );
	$text_b = hexdec( $b );
	
	$colour=$_GET['math_grid'];
	if ( strlen( $colour ) == 6 )
		list( $r, $g, $b ) = array( $colour[0].$colour[1], $colour[2].$colour[3], $colour[4].$colour[5] );
	elseif ( strlen( $colour ) == 3 )
		list( $r, $g, $b ) = array( $colour[0].$colour[0], $colour[1].$colour[1], $colour[2].$colour[2] );
	else
		return false;

    $grid_r = hexdec( $r );
	$grid_g = hexdec( $g );
	$grid_b = hexdec( $b );
	
	$black = imagecolorallocate($img,$text_r,$text_g,$text_b);
	$white = imagecolorallocate($img,$backg_r,$backg_g,$backg_b);
	$grey = imagecolorallocate($img,$grid_r,$grid_g,$grid_b);
	/*
		make the background white
	*/
	imagefill( $img, 0, 0, $white );	
	/* the background grid lines - vertical lines */
	for ($t = $bg_size; $t<$captcha_w; $t+=$bg_size){
		imageline($img, $t, 0, $t, $captcha_h, $grey);
	}
	/* background grid - horizontal lines */
	for ($t = $bg_size; $t<$captcha_h; $t+=$bg_size){
		imageline($img, 0, $t, $captcha_w, $t, $grey);
	}
	
	/* 
		this determinates the available space for each operation element 
		it's used to position each element on the image so that they don't overlap
	*/
	$item_space = $captcha_w/3;
	
	/* first number */
	imagettftext(
		$img,
		rand(
			$min_font_size,
			$max_font_size
		),
		rand( -$angle , $angle ),
		rand( 10, $item_space-20 ),
		rand( 25, $captcha_h-25 ),
		$black,
		$font_path,
		$second_num);
	
	/* operator */
	imagettftext(
		$img,
		rand(
			$min_font_size,
			$max_font_size
		),
		rand( -$angle, $angle ),
		rand( $item_space, 2*$item_space-20 ),
		rand( 25, $captcha_h-25 ),
		$black,
		$font_path,
		$operators[0]);
	
	/* second number */
	imagettftext(
		$img,
		rand(
			$min_font_size,
			$max_font_size
		),
		rand( -$angle, $angle ),
		rand( 2*$item_space, 3*$item_space-20),
		rand( 25, $captcha_h-25 ),
		$black,
		$font_path,
		$first_num);
			
	if (function_exists("imagepng"))
	{
		header("Content-type: image/png");
		imagepng($img);
	}
	elseif (function_exists("imagegif"))
	{
		header("Content-type: image/gif");
		imagegif($img);
	}
	elseif (function_exists("imagejpeg"))
	{
		header("Content-type: image/jpeg");
		imagejpeg($img);
	}
?>