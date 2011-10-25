<?php /** @version $Id: view-settings.php 913 2011-08-10 08:00:57Z xagero $ */ ?>
<?php $config = $this->config();?>
<form method="post" action="">
<?php include 'inc.submit-buttons.php';?> 
<fieldset>
  <legend>Enable CAPTCHA</legend>
  <ul class="thethe-settings-list">
   <li>
      <label for="data-en_s">Symbol CAPTCHA:</label>
      <input name="data[en_captcha]" id="data-en_s" class="str-field" value="symbol" type="radio" <?php if ($config['en_captcha']=="symbol") echo 'checked="checked"'; ?> >
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>  <li>
      <label for="data-en_m">Mathematical CAPTCHA:</label>
      <input name="data[en_captcha]" id="data-en_m" class="str-field" value="math" type="radio" <?php if ($config['en_captcha']=="math") echo 'checked="checked"'; ?>>
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li> 
  </ul>
</fieldset>
<!--
<fieldset>
  <legend>Settings Symbol CAPTCHA</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="data-w3_count">Количество символов:</label>
      <input name="data[w3_count]" id="data-w3_count" class="str-field" value="<?php print $config['w3_count'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li> 
    <li>
    <label for="data-w3_width">Ширина картинки:</label>
      <input name="data[w3_width]" id="data-w3_width" class="str-field" value="<?php print $config['w3_width'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li> 
    <li>
      <label for="data-w3_height">Высота картинки:</label>
      <input name="data[w3_height]" id="data-w3_height" class="str-field" value="<?php print $config['w3_height'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-w3_font_size_min">Минимальная высота символа:</label>
      <input name="data[w3_font_size_min]" id="data-w3_font_size_min" class="str-field" value="<?php print $config['w3_font_size_min'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-w3_font_size_max">Максимальная высота символа:</label>
      <input name="data[w3_font_size_max]" id="data-w3_font_size_max" class="str-field" value="<?php print $config['w3_font_size_max'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-w3_char_angle_min">Максимальный наклон символа влево:</label>
      <input name="data[w3_char_angle_min]" id="data-w3_char_angle_min" class="str-field" value="<?php print $config['w3_char_angle_min'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	 <li>
      <label for="data-w3_char_angle_max">Максимальный наклон символа вправо:</label>
      <input name="data[w3_char_angle_max]" id="data-w3_char_angle_max" class="str-field" value="<?php print $config['w3_char_angle_max'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-w3_char_angle_shadow">Размер тени:</label>
      <input name="data[w3_char_angle_shadow]" id="data-w3_char_angle_shadow" class="str-field" value="<?php print $config['w3_char_angle_shadow'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-w3_char_align">Выравнивание символа по-вертикали:</label>
      <input name="data[w3_char_align]" id="data-w3_char_align" class="str-field" value="<?php print $config['w3_char_align'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-w3_start">Позиция первого символа по-горизонтали:</label>
      <input name="data[w3_start]" id="data-w3_start" class="str-field" value="<?php print $config['w3_start'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-w3_interval">Интервал между началами символов:</label>
      <input name="data[w3_interval]" id="data-w3_interval" class="str-field" value="<?php print $config['w3_interval'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-w3_chars">Набор символов:</label>
      <input name="data[w3_chars]" id="data-w3_chars" class="str-field" value="<?php print $config['w3_chars'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-w3_noise">Уровень шума:</label>
      <input name="data[w3_noise]" id="data-w3_noise" class="str-field" value="<?php print $config['w3_noise'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
  </ul>
</fieldset>
<?php
echo '
<script type=\'text/javascript\'>
jQuery(document).ready(function($) {
	$("#reload_captcha").click(function() {
	document.images["thethe_captcha"].src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/w3captcha.php.?w3_count='.$config['w3_count'].'&w3_width='.$config['w3_width'].'&w3_height='.$config['w3_height'].'&w3_font_size_min='.$config['w3_font_size_min'].'&w3_font_size_max='.$config['w3_font_size_max'].'&w3_char_angle_min='.$config['w3_char_angle_min'].'&w3_char_angle_max='.$config['w3_char_angle_max'].'&w3_char_angle_shadow='.$config['w3_char_angle_shadow'].'&w3_char_align='.$config['w3_char_align'].'&w3_start='.$config['w3_start'].'&w3_interval='.$config['w3_interval'].'&w3_chars='.$config['w3_chars'].'&w3_noise='.$config['w3_noise'].'&rand="+ Math.round(Math.random (0) * 1000);
	}) 
}) 
</script>
';
?>
<legend>Example CAPTCHA</legend>
<?php
	echo '<img src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/w3captcha.php?w3_count='.$config['w3_count'].'&w3_width='.$config['w3_width'].'&w3_height='.$config['w3_height'].'&w3_font_size_min='.$config['w3_font_size_min'].'&w3_font_size_max='.$config['w3_font_size_max'].'&w3_char_angle_min='.$config['w3_char_angle_min'].'&w3_char_angle_max='.$config['w3_char_angle_max'].'&w3_char_angle_shadow='.$config['w3_char_angle_shadow'].'&w3_char_align='.$config['w3_char_align'].'&w3_start='.$config['w3_start'].'&w3_interval='.$config['w3_interval'].'&w3_chars='.$config['w3_chars'].'&w3_noise='.$config['w3_noise'].'" alt="CAPTCHA" id="thethe_captcha" />
	<img src="'.WP_PLUGIN_URL.'/thethe-captcha/style/images/reload.gif" id="reload_captcha" alt="CAPTCHA Reload" title="CAPTCHA Reload"/>
	<br />
	';
?>
<fieldset>
  <legend>Settings Mathematical CAPTCHA</legend>
  <ul class="thethe-settings-list">
    <li>
    <label for="data-math_captcha_w">CAPTCHA width:</label>
      <input name="data[math_captcha_w]" id="data-math_captcha_w" class="str-field" value="<?php print $config['math_captcha_w'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li> 
    <li>
      <label for="data-math_captcha_h">CAPTCHA height:</label>
      <input name="data[math_captcha_h]" id="data-math_captcha_h" class="str-field" value="<?php print $config['math_captcha_h'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-math_min_font_size">Minimum font size:</label>
      <input name="data[math_min_font_size]" id="data-math_min_font_size" class="str-field" value="<?php print $config['math_min_font_size'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-math_max_font_size">Maximum font size:</label>
      <input name="data[math_max_font_size]" id="data-math_max_font_size" class="str-field" value="<?php print $config['math_max_font_size'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-math_angle">Rotation angle:</label>
      <input name="data[math_angle]" id="data-math_angle" class="str-field" value="<?php print $config['math_angle'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	 <li>
      <label for="data-math_bg_size">Background grid size:</label>
      <input name="data[math_bg_size]" id="data-math_bg_size" class="str-field" value="<?php print $config['math_bg_size'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>
	<li>
      <label for="data-math_operators">Possible operators:</label>
		<input name="data[math_operators_plus]" id="data-math_operators_plus"   type="checkbox" <?php if ($config['math_operators_plus']) echo 'checked="checked"'; ?> > <span style="padding-right:10px">+</span>

	  <input name="data[math_operators_sub]" id="data-math_operators_sub"   type="checkbox" <?php if ($config['math_operators_sub']) echo 'checked="checked"'; ?> > <span style="padding-right:10px">-</span>

	  <input name="data[math_operators_mu]" id="data-math_operators_mu"   type="checkbox" <?php if ($config['math_operators_mu']) echo 'checked="checked"'; ?> > <span style="padding-right:10px">*</span>

	  <input name="data[math_operators_di]" id="data-math_operators_di"  type="checkbox" <?php if ($config['math_operators_di']) echo 'checked="checked"'; ?> > <span>/</span>
      <a class="tooltip" href="javascript:void(0);">?<span></a> 
	</li>

	<li>
      <label for="data-math_first_num">First number, range of random values (keep it lower than Second Number):</label>
      <input name="data[math_first_num_1]" id="data-math_first_num_1"  value="<?php print $config['math_first_num_1'];?>" type="text" size="5">
	  <input name="data[math_first_num_2]" id="data-math_first_num_2"  value="<?php print $config['math_first_num_2'];?>" type="text" size="5">
      <a class="tooltip" href="javascript:void(0);">?<span>Range of random values from X to Y</span></a> 
	</li>
	<li>
      <label for="data-math_second_num">Second number random value:</label>
      <input name="data[math_second_num_1]" id="data-math_second_num_1" value="<?php print $config['math_second_num_1'];?>" type="text" size="5">
	    <input name="data[math_second_num_2]" id="data-math_second_num_2" value="<?php print $config['math_second_num_2'];?>" type="text" size="5">
      <a class="tooltip" href="javascript:void(0);">?<span>Range of random values from X to Y</span></a> 
	</li>
  </ul>
</fieldset>

<?php
echo '
<script type=\'text/javascript\'>
jQuery(document).ready(function($) {
	$("#reload_captcha_math").click(function() {
	document.images["thethe_captcha_math"].src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/math_captcha.php.?math_captcha_w='.$config['math_captcha_w'].'&math_captcha_h='.$config['math_captcha_h'].'&math_min_font_size='.$config['math_min_font_size'].'&math_max_font_size='.$config['math_max_font_size'].'&math_angle='.$config['math_angle'].'&math_bg_size='.$config['math_bg_size'].'&math_operators_mu='.$config['math_operators_mu'].'&math_operators_sub='.$config['math_operators_sub'].'&math_operators_plus='.$config['math_operators_plus'].'&math_operators_di='.$config['math_operators_di'].'&math_first_num_1='.$config['math_first_num_1'].'&math_first_num_2='.$config['math_first_num_2'].'&math_second_num_1='.$config['math_second_num_1'].'&math_second_num_2='.$config['math_second_num_2'].'&rand="+ Math.round(Math.random (0) * 1000);
	}) 
}) 
</script>
';
?>
<legend>Example CAPTCHA</legend>
<?php
echo '<img src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/math_captcha.php.?math_captcha_w='.$config['math_captcha_w'].'&math_captcha_h='.$config['math_captcha_h'].'&math_min_font_size='.$config['math_min_font_size'].'&math_max_font_size='.$config['math_max_font_size'].'&math_angle='.$config['math_angle'].'&math_bg_size='.$config['math_bg_size'].'&math_operators_mu='.$config['math_operators_mu'].'&math_operators_sub='.$config['math_operators_sub'].'&math_operators_plus='.$config['math_operators_plus'].'&math_operators_di='.$config['math_operators_di'].'&math_first_num_1='.$config['math_first_num_1'].'&math_first_num_2='.$config['math_first_num_2'].'&math_second_num_1='.$config['math_second_num_1'].'&math_second_num_2='.$config['math_second_num_2'].'" alt="CAPTCHA" id="thethe_captcha_math" />
	<img src="'.WP_PLUGIN_URL.'/thethe-captcha/style/images/reload.gif" id="reload_captcha_math" alt="CAPTCHA Reload" title="CAPTCHA Reload"/>
	<br />
	';	
?>
-->
<?php
 include 'inc.submit-buttons.php';?> 
</form>