<?php
/*
Plugin Name: TheThe CAPTCHA
Plugin URI: http://thethefly.com/wp-plugins/thethe-captcha/
Description: TheThe Fly CAPTCHA

Version: 1.0.1
Author: TheThe Fly
Author URI: http://www.thethefly.com
*/
/**
 * @version 	$Id$
 */
/**
 * Init classes,func and libs
 */
/** Require RSS lib */
require_once ABSPATH . WPINC . '/class-simplepie.php';
require_once ABSPATH . WPINC . '/class-feed.php';
require_once ABSPATH . WPINC . '/feed.php';
/** Require WP Plugin API */
require_once ABSPATH . '/wp-admin/includes/plugin.php';
require_once realpath(dirname(__FILE__) . '/lib/lib.core.php');
TheTheFly_require(dirname(__FILE__) . '/inc', array('data.'));
TheTheFly_require(dirname(__FILE__) . '/lib', array('func.','lib.'));
TheTheFly_require(dirname(__FILE__) . '/lib', array('class.','widget.'));
$TheTheCaptcha = array(
    'wp_plugin_dir' => dirname(__FILE__),
	'wp_plugin_dir_url' => WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)),	
	'wp_plugin_base_name' => plugin_basename(__FILE__),
	'wp_plugin_name' => 'TheThe CAPTCHA',
	'wp_plugin_version' => '1.0.1'
);
/**
 * Current plugin config
 * @var array
 */
$Plugin_Config = array(
	'shortname' => 'captcha',
	'plugin-hook' => 'thethe-captcha/captcha.php',
	'options' => array(
		'default-s' => array(
			/* Symbol captcha */
			'w3_comment' => true,			
			'w3_reg' => false,			
			'w3_count' => 5,
			'w3_width' => 100,
			'w3_height' => 48,
			'w3_font_size_min' => 32,
			'w3_font_size_max' => 32,
			'w3_char_angle_min' => 10,
			'w3_char_angle_max' => 10,
			'w3_char_angle_shadow' => 5,
			'w3_char_align' => 40,
			'w3_start' => 5,
			'w3_interval' => 16,
			'w3_chars' => '0123456789',
			'w3_noise' => 10,
			'w3_backg' => '#ffffff',
			'w3_shadow' => '#000000'
		),
		'default-m' => array(
			/* Mathematical captcha */	
			'math_comment' => false,			
			'math_reg' => false,			
			'math_captcha_w' => 150,
			'math_captcha_h' => 50,
			'math_min_font_size' => 12,
			'math_max_font_size' => 18,
			'math_angle' => 20,
			'math_bg_size' => 13,
			'math_operators_plus' => true,
			'math_operators_sub' => true,
			'math_operators_mu' => true,
			'math_operators_di' => false,
			'math_first_num_1' => 1,
			'math_first_num_2' => 5,
			'math_second_num_1' => 6,
			'math_second_num_2' => 11,
			'math_backg' => '#ffffff',
			'math_text' => '#000000',
			'math_grid' => '#D7D7D7'
		)		
	),
	'requirements' => array('wp' => '3.1')
) + array('meta' => get_plugin_data(realpath(__FILE__)) + array(
	'wp_plugin_dir' => dirname(__FILE__),
	'wp_plugin_dir_url' => plugin_dir_url(__FILE__)
)) + array(
	'clubpanel' => array(),
	'adminpanel' => array('sidebar.donate' => true)
);

/**
 * @var PluginCaptcha
 */
$GLOBALS['PluginCaptcha'] = new PluginCaptcha();

/**
 * Configure
 */
$GLOBALS['PluginCaptcha']->configure($Plugin_Config);

/**
 * Init
 */
TheTheFly_require(dirname(__FILE__),array('init.'));
$GLOBALS['PluginCaptcha']->init();

/** @todo fixme */
if (!function_exists('TheThe_makeAdminPage')) {
	function TheThe_makeAdminPage() {
		$GLOBALS['PluginCaptcha']->displayAboutClub();
	}
}
 load_plugin_textdomain('thethe-captcha', false, dirname(plugin_basename(__FILE__)).'/languages' );