<?php
/**
 * @version		$Id$
 * @author		xagero
 */
class PluginCaptcha extends PluginCaptcha_Abstract
{
	// }}}
	// {{{ init

	/**
	 * (non-PHPdoc)
	 * @see PluginAbstract::init()
	 */
	public function init()
	{
		parent::init();
		$this->viewIndexAll = array(
			'overview' => array(
				'title-tab' => 'Overview',
				'title' => $this->_config['meta']['Name'] . '&nbsp;Overview'
			),
			'settings-symbol' => array(
				'title-tab' => 'Symbol CAPTCHA Settings',
				'title' => $this->_config['meta']['Name'] . '&nbsp;Settings'
			),
			'settings-math' => array(
				'title-tab' => 'Mathematical CAPTCHA Settings',
				'title' => $this->_config['meta']['Name'] . '&nbsp;Settings'
			)
			
		);
	} // end func init
	public function _hook_wp_print_style()
	{
		$myStyleUrl = WP_PLUGIN_URL . '/thethe-captcha/style/style.css';
        wp_register_style('thethe-captcha', $myStyleUrl);
		wp_enqueue_style('thethe-captcha');
	}
	
	public function thethe_captcha_comment_form() {
  
	 if (is_user_logged_in()) {
       if ( current_user_can(10)) {
               return true;
       }
    }
	echo '<p class="comment-form-captcha">';
	$config_m = $this->config('default-m');
	$config_s = $this->config('default-s');
	if ($config_s['w3_comment']=="on" || $config_s['w3_comment']==1)
	{
		$config = $this->config('default-s');
		$w3_backg = substr($config['w3_backg'], 1);
		$w3_shadow = substr($config['w3_shadow'], 1);
echo '
<script type=\'text/javascript\'>
jQuery(document).ready(function($) {
	$("#reload_captcha").click(function() {
	document.images["thethe_captcha"].src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/w3captcha.php?w3_count='.$config['w3_count'].'&w3_width='.$config['w3_width'].'&w3_height='.$config['w3_height'].'&w3_font_size_min='.$config['w3_font_size_min'].'&w3_font_size_max='.$config['w3_font_size_max'].'&w3_char_angle_min='.$config['w3_char_angle_min'].'&w3_char_angle_max='.$config['w3_char_angle_max'].'&w3_char_angle_shadow='.$config['w3_char_angle_shadow'].'&w3_char_align='.$config['w3_char_align'].'&w3_start='.$config['w3_start'].'&w3_interval='.$config['w3_interval'].'&w3_chars='.$config['w3_chars'].'&w3_noise='.$config['w3_noise'].'&w3_backg='.$w3_backg.'&w3_shadow='.$w3_shadow.'&rand="+ Math.round(Math.random (0) * 1000);
	}) 
}) 
</script>
';
	echo '<img src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/w3captcha.php?w3_count='.$config['w3_count'].'&w3_width='.$config['w3_width'].'&w3_height='.$config['w3_height'].'&w3_font_size_min='.$config['w3_font_size_min'].'&w3_font_size_max='.$config['w3_font_size_max'].'&w3_char_angle_min='.$config['w3_char_angle_min'].'&w3_char_angle_max='.$config['w3_char_angle_max'].'&w3_char_angle_shadow='.$config['w3_char_angle_shadow'].'&w3_char_align='.$config['w3_char_align'].'&w3_start='.$config['w3_start'].'&w3_interval='.$config['w3_interval'].'&w3_chars='.$config['w3_chars'].'&w3_noise='.$config['w3_noise'].'&w3_backg='.$w3_backg.'&w3_shadow='.$w3_shadow.'" alt="Captcha" id="thethe_captcha" />
	<img src="'.WP_PLUGIN_URL.'/thethe-captcha/style/images/reload.gif" id="reload_captcha" alt="Captcha Reload" title="Captcha Reload"/>
	<br />
	';
	echo '
	<label for="captcha_input">'.__("CAPTCHA Code","thethe-captcha").'</label>
	<input type="text" name="captcha_input" />
	';	
}
elseif ($config_m['math_comment']=="on" || $config_m['math_comment']==1)
{
	$config = $this->config('default-m');
	$math_backg = substr($config['math_backg'], 1);
	$math_text = substr($config['math_text'], 1);
	$math_grid = substr($config['math_grid'], 1);
	echo '
<script type=\'text/javascript\'>
jQuery(document).ready(function($) {
	$("#reload_captcha").click(function() {
	document.images["thethe_captcha"].src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/math_captcha.php?math_captcha_w='.$config['math_captcha_w'].'&math_captcha_h='.$config['math_captcha_h'].'&math_min_font_size='.$config['math_min_font_size'].'&math_max_font_size='.$config['math_max_font_size'].'&math_angle='.$config['math_angle'].'&math_bg_size='.$config['math_bg_size'].'&math_operators_mu='.$config['math_operators_mu'].'&math_operators_sub='.$config['math_operators_sub'].'&math_operators_plus='.$config['math_operators_plus'].'&math_operators_di='.$config['math_operators_di'].'&math_first_num_1='.$config['math_first_num_1'].'&math_first_num_2='.$config['math_first_num_2'].'&math_second_num_1='.$config['math_second_num_1'].'&math_second_num_2='.$config['math_second_num_2'].'&math_backg='.$math_backg.'&math_text='.$math_text.'&math_grid='.$math_grid.'&rand="+ Math.round(Math.random (0) * 1000);
	}) 
}) 
</script>
';
	echo '<img src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/math_captcha.php?math_captcha_w='.$config['math_captcha_w'].'&math_captcha_h='.$config['math_captcha_h'].'&math_min_font_size='.$config['math_min_font_size'].'&math_max_font_size='.$config['math_max_font_size'].'&math_angle='.$config['math_angle'].'&math_bg_size='.$config['math_bg_size'].'&math_operators_mu='.$config['math_operators_mu'].'&math_operators_sub='.$config['math_operators_sub'].'&math_operators_plus='.$config['math_operators_plus'].'&math_operators_di='.$config['math_operators_di'].'&math_first_num_1='.$config['math_first_num_1'].'&math_first_num_2='.$config['math_first_num_2'].'&math_second_num_1='.$config['math_second_num_1'].'&math_second_num_2='.$config['math_second_num_2'].'&math_backg='.$math_backg.'&math_text='.$math_text.'&math_grid='.$math_grid.'" alt="Captcha" id="thethe_captcha" />
	<img src="'.WP_PLUGIN_URL.'/thethe-captcha/style/images/reload.gif" id="reload_captcha" alt="Captcha Reload" title="Captcha Reload"/>
	<br />
	';
	echo '<label for="captcha_input">'.__("Result","thethe-captcha").'</label>
	<input type="text" name="captcha_input" />
	</p>';
}
	return true;
} // end function thethe_captcha_comment_form
	
	public function _SettingsSymbolView()
	{   
		if (isset($_POST['data']) && isset($_POST['submit'])) {
			$dataValid = $this->_settingsValidate($_POST['data'],"s");
				if ($dataValid) {
					update_option('_ttf-' . $this->_config['shortname'] .'-default-s', $dataValid);
					$data_m=get_option('_ttf-' . $this->_config['shortname'] .'-default-m');
					if ($dataValid['w3_comment']==1 || $dataValid['w3_comment']=='on') $data_m['math_comment']=false;
					if ($dataValid['w3_reg']==1 || $dataValid['w3_reg']=='on') $data_m['math_reg']=false;
					update_option('_ttf-' . $this->_config['shortname'] .'-default-m', $data_m);
				}
		}
		elseif (isset($_POST['reset'])) {
				update_option('_ttf-' . $this->_config['shortname'] .'-default-s',$this->_config['options']['default-s']);
				$data_m=get_option('_ttf-' . $this->_config['shortname'] .'-default-m');
				$data_m['math_comment']=false;
				update_option('_ttf-' . $this->_config['shortname'] .'-default-m', $data_m);
		}
		parent::_defaultView();
	}  // end func _SettingsSymbolView

	public function _SettingsMathView()
	{   
		if (isset($_POST['data']) && isset($_POST['submit'])) {
			$dataValid = $this->_settingsValidate($_POST['data'],"m");
				if ($dataValid) {
					update_option('_ttf-' . $this->_config['shortname'] .'-default-m', $dataValid);
					$data_s=get_option('_ttf-' . $this->_config['shortname'] .'-default-s');
					if ($dataValid['math_comment']==1 || $dataValid['math_comment']=='on') $data_s['w3_comment']=false;
					if ($dataValid['math_reg']==1 || $dataValid['math_reg']=='on') $data_s['w3_reg']=false;
					update_option('_ttf-' . $this->_config['shortname'] .'-default-s', $data_s);
				}
		}
		elseif (isset($_POST['reset'])) {
				update_option('_ttf-' . $this->_config['shortname'] .'-default-m',$this->_config['options']['default-m']);
		}
		parent::_defaultView();
	}  // end func _SettingsMathView
	
	// }}}
	
/**
	 * Function _settingsValidate
	 * @param array $data
	 */
	public function _settingsValidate($data,$captcha)
	{
		if (!is_array($data)) return false;
		if ($captcha=="s"){
			foreach (($dataValid = array(
				'w3_comment' => null,			
				'w3_reg' => null,		
				'w3_count' => null,
				'w3_width' => null,
				'w3_height' => null,
				'w3_font_size_min' => null,
				'w3_font_size_max' => null,
				'w3_char_angle_min' => null,
				'w3_char_angle_max' => null,
				'w3_char_angle_shadow' => null,
				'w3_char_align' => null,
				'w3_start' => null,
				'w3_interval' => null,
				'w3_chars' => null, 
				'w3_noise' => null,
				'w3_backg' => null,
				'w3_shadow' => null
				)
			) as $k=>$v ) {
				$dataValid[$k] = trim($data[$k]);
			}
		}
		elseif ($captcha=="m"){
			foreach (($dataValid = array(
			/* Math Captcha */		
			'math_comment' => null,			
			'math_reg' => null,	
			'math_captcha_w' => null,
			'math_captcha_h' => null,
			'math_min_font_size' => null,
			'math_max_font_size' => null,
			'math_angle' => null,
			'math_bg_size' => null,
			'math_operators_plus' => null,
			'math_operators_sub' => null,
			'math_operators_mu' => null,
			'math_operators_di' => null,
			'math_first_num_1' => null,
			'math_first_num_2' => null,
			'math_second_num_1' => null,
			'math_second_num_2' => null,
			'math_backg' => null,
			'math_text' => null,
			'math_grid' => null
			)
			) as $k=>$v ) {
				$dataValid[$k] = trim($data[$k]);
			}
		}
		return $dataValid;
			
	} // end func _settingsValidate
	// }}}
	
public function thethe_captcha_comment_post($comment) {
  
    if (is_user_logged_in() ) {
       if ( current_user_can(10) ) {
           return $comment;
        }
    }

	if (empty($_POST['captcha_input']) || $_POST['captcha_input'] == '') {
	   wp_die( __('Error: You have not entered a CAPTCHA phrase. Press your browser\'s back button and try again.', 'thethe-captcha'));
	}
   	$config_m = $this->config('default-m');
	$config_s = $this->config('default-s');
	if ($config_m['math_comment']=="on" || $config_m['math_comment']==1)
	{
	$captcha_input = trim(strip_tags($_POST['captcha_input']));
	$valid=false;
	session_start();
	if ($_SESSION["security_number"]==$captcha_input) $valid=true; else $valid=false;
	if($valid == true) {
		return($comment);
	} else {
	   wp_die( __('Error: You have entered a wrong CAPTCHA phrase. Press your browser\'s back button and try again.', 'thethe-captcha'));
	}
	unset($_SESSION["security_number"]); 
	}
	elseif  ($config_s['w3_comment']=="on" || $config_s['w3_comment']==1)
	{
	$captcha_input = trim(strip_tags($_POST['captcha_input']));
	$valid=false;
	session_start();
	if ($_SESSION["thethe_captcha"]==$captcha_input) $valid=true; else $valid=false;
	if($valid == true) {
		return($comment);
	} else {
	   wp_die( __('Error: You have entered a wrong CAPTCHA phrase. Press your browser\'s back button and try again.', 'thethe-captcha'));
	}
	unset($_SESSION["thethe_captcha"]); 
	}
} // end function thethe_captcha_comment_post

 // this function adds the captcha to the register form
function thethe_captcha_register_form() {
	$config_m = $this->config('default-m');
	$config_s = $this->config('default-s');

	if (($config_s['w3_reg']=="on") || ($config_s['w3_reg']=='1'))
	{
		$config = $this->config('default-s');
		$w3_backg = substr($config['w3_backg'], 1);
		$w3_shadow = substr($config['w3_shadow'], 1);
echo '<p>
<script type=\'text/javascript\'>
jQuery(document).ready(function($) {
	$("#reload_captcha").click(function() {
	document.images["thethe_captcha"].src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/w3captcha.php?w3_count='.$config['w3_count'].'&w3_width='.$config['w3_width'].'&w3_height='.$config['w3_height'].'&w3_font_size_min='.$config['w3_font_size_min'].'&w3_font_size_max='.$config['w3_font_size_max'].'&w3_char_angle_min='.$config['w3_char_angle_min'].'&w3_char_angle_max='.$config['w3_char_angle_max'].'&w3_char_angle_shadow='.$config['w3_char_angle_shadow'].'&w3_char_align='.$config['w3_char_align'].'&w3_start='.$config['w3_start'].'&w3_interval='.$config['w3_interval'].'&w3_chars='.$config['w3_chars'].'&w3_noise='.$config['w3_noise'].'&w3_backg='.$w3_backg.'&w3_shadow='.$w3_shadow.'&rand="+ Math.round(Math.random (0) * 1000);
	}) 
}) 
</script>
';
	echo '<img src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/w3captcha.php?w3_count='.$config['w3_count'].'&w3_width='.$config['w3_width'].'&w3_height='.$config['w3_height'].'&w3_font_size_min='.$config['w3_font_size_min'].'&w3_font_size_max='.$config['w3_font_size_max'].'&w3_char_angle_min='.$config['w3_char_angle_min'].'&w3_char_angle_max='.$config['w3_char_angle_max'].'&w3_char_angle_shadow='.$config['w3_char_angle_shadow'].'&w3_char_align='.$config['w3_char_align'].'&w3_start='.$config['w3_start'].'&w3_interval='.$config['w3_interval'].'&w3_chars='.$config['w3_chars'].'&w3_noise='.$config['w3_noise'].'&w3_backg='.$w3_backg.'&w3_shadow='.$w3_shadow.'" alt="Captcha" id="thethe_captcha" />
	<img src="'.WP_PLUGIN_URL.'/thethe-captcha/style/images/reload.gif" id="reload_captcha" alt="Captcha Reload" title="Captcha Reload"/>
	<br />
	';
	echo '
	<label for="captcha_input">'.__("CAPTCHA Code","thethe-captcha").'<br />
	<input id="captcha_input" type="text" name="captcha_input" class="input" /></label>
	</p>
	';
}
elseif ($config_m['math_reg']=="on" || $config_m['math_reg']==1)
{
	$config = $this->config('default-m');
	$math_backg = substr($config['math_backg'], 1);
	$math_text = substr($config['math_text'], 1);
	$math_grid = substr($config['math_grid'], 1);
	echo '<p>
<script type=\'text/javascript\'>
jQuery(document).ready(function($) {
	$("#reload_captcha").click(function() {
	document.images["thethe_captcha"].src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/math_captcha.php?math_captcha_w='.$config['math_captcha_w'].'&math_captcha_h='.$config['math_captcha_h'].'&math_min_font_size='.$config['math_min_font_size'].'&math_max_font_size='.$config['math_max_font_size'].'&math_angle='.$config['math_angle'].'&math_bg_size='.$config['math_bg_size'].'&math_operators_mu='.$config['math_operators_mu'].'&math_operators_sub='.$config['math_operators_sub'].'&math_operators_plus='.$config['math_operators_plus'].'&math_operators_di='.$config['math_operators_di'].'&math_first_num_1='.$config['math_first_num_1'].'&math_first_num_2='.$config['math_first_num_2'].'&math_second_num_1='.$config['math_second_num_1'].'&math_second_num_2='.$config['math_second_num_2'].'&math_backg='.$math_backg.'&math_text='.$math_text.'&math_grid='.$math_grid.'&rand="+ Math.round(Math.random (0) * 1000);
	}) 
}) 
</script>
';
	echo '<img src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/math_captcha.php?math_captcha_w='.$config['math_captcha_w'].'&math_captcha_h='.$config['math_captcha_h'].'&math_min_font_size='.$config['math_min_font_size'].'&math_max_font_size='.$config['math_max_font_size'].'&math_angle='.$config['math_angle'].'&math_bg_size='.$config['math_bg_size'].'&math_operators_mu='.$config['math_operators_mu'].'&math_operators_sub='.$config['math_operators_sub'].'&math_operators_plus='.$config['math_operators_plus'].'&math_operators_di='.$config['math_operators_di'].'&math_first_num_1='.$config['math_first_num_1'].'&math_first_num_2='.$config['math_first_num_2'].'&math_second_num_1='.$config['math_second_num_1'].'&math_second_num_2='.$config['math_second_num_2'].'&math_backg='.$math_backg.'&math_text='.$math_text.'&math_grid='.$math_grid.'" alt="Captcha" id="thethe_captcha" />
	<img src="'.WP_PLUGIN_URL.'/thethe-captcha/style/images/reload.gif" id="reload_captcha" alt="Captcha Reload" title="Captcha Reload"/>
	<br />
	';
	echo '
	<label for="captcha_input">'.__("Result","thethe-captcha").'<br />
	<input id="captcha_input" type="text" name="captcha_input" class="input" /></label>
	</p>
	';
  }

  return true;
} // end function thethe_captcha_register_form

// this function checks the captcha posted with registration
function thethe_captcha_register_post($errors) {

	  if (empty($_POST['captcha_input']) || $_POST['captcha_input'] == '') {
				$errors->add('thethe_captcha_blank', '<strong>'.__('ERROR', 'thethe-captcha').'</strong>: '.__('Please Complete the CAPTCHA.', 'thethe-captcha'));
				return $errors;
	  } 
    $config_m = $this->config('default-m');
	$config_s = $this->config('default-s');
	if ($config_m['math_reg']=="on" || $config_m['math_reg']==1)
	{
	$captcha_input = trim(strip_tags($_POST['captcha_input']));
	$valid=false;
	session_start();
	if ($_SESSION["security_number"]==$captcha_input) $valid=true; else $valid=false;
	if($valid == true) {
	} else {
	 $errors->add('thethe_captcha_wrong', '<strong>'.__('ERROR', 'thethe-captcha').'</strong>: '.__('That CAPTCHA was incorrect. Make sure you have not disabled cookies.', 'thethe-captcha'));
	}
	unset($_SESSION["security_number"]); 
	}
	elseif  ($config_s['w3_reg']=="on" || $config_s['w3_reg']==1)
	{
	$captcha_input = trim(strip_tags($_POST['captcha_input']));
	$valid=false;
	session_start();
	if ($_SESSION["thethe_captcha"]==$captcha_input) $valid=true; else $valid=false;
	if($valid == true) {

	} else {
	    $errors->add('thethe_captcha_wrong', '<strong>'.__('ERROR', 'thethe-captcha').'</strong>: '.__('That CAPTCHA was incorrect. Make sure you have not disabled cookies.', 'thethe-captcha'));
	}
	unset($_SESSION["thethe_captcha"]); 
	}

   return($errors);
} // end function thethe_captcha_register_post

} // end func PluginCaptcha