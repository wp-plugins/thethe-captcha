<?php /** @version $Id: view-settings-symbol.php */ ?>
<?php $config = $this->config('default-s');?>
<form method="post" action="">
<?php include 'inc.submit-buttons.php';?> 
<fieldset>
  <legend><?php _e('Symbol CAPTCHA Settings','thethe-captcha'); ?></legend>
  <ul class="thethe-settings-list">
	 <li>
      <label for="data-w3_comment"><?php _e('Enable on Comments Form','thethe-captcha'); ?>:</label>
      <input name="data[w3_comment]" id="data-w3_comment" class="str-field"  type="checkbox" <?php if ($config['w3_comment']) echo 'checked="checked"'; ?> >
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Check this box to add the CAPTCHA to your comment forms','thethe-captcha'); ?></span></a> 
	</li> 
	 <li>
      <label for="data-w3_reg"><?php _e('Enable on Registration Form','thethe-captcha'); ?>:</label>
      <input name="data[w3_reg]" id="data-w3_reg" class="str-field"  type="checkbox" <?php if ($config['w3_reg']) echo 'checked="checked"'; ?> >
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Check this box to add the CAPTCHA to your user registration form','thethe-captcha'); ?></span></a> 
	</li> 
	<li>
      <label for="data-w3_backg"><?php _e('Background Color','thethe-captcha'); ?>:</label>
      <input name="data[w3_backg]" id="data-w3_backg" class="pickcolor" size="19" value="<?php print $config['w3_backg'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Choose a color for your CAPTCHA box background','thethe-captcha'); ?></span></a> 
	</li>
	<li>
      <label for="data-w3_shadow"><?php _e('Shadow Color','thethe-captcha'); ?>:</label>
        <input name="data[w3_shadow]" id="data-w3_shadow" class="pickcolor" size="19" value="<?php print $config['w3_shadow'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Choose a color for your CAPTCHA symbol shadow','thethe-captcha'); ?></span></a> 
	</li>
    <li>
      <label for="data-w3_count"><?php _e('Symbol Quantity','thethe-captcha'); ?>:</label>
      <input name="data[w3_count]" id="data-w3_count" class="str-field" value="<?php print $config['w3_count'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Specify the number of symbols to use on your CAPTCHA','thethe-captcha'); ?></span></a> 
	</li> 
    <li>
    <label for="data-w3_width"><?php _e('СAPTCHA Width','thethe-captcha'); ?>:</label>
      <input name="data[w3_width]" id="data-w3_width" class="str-field" value="<?php print $config['w3_width'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Specify the CAPTCHA box width in pixels','thethe-captcha'); ?></span></a> 
	</li> 
    <li>
      <label for="data-w3_height"><?php _e('CAPTCHA Height','thethe-captcha'); ?>:</label>
      <input name="data[w3_height]" id="data-w3_height" class="str-field" value="<?php print $config['w3_height'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Specify the CAPTCHA box height in pixels','thethe-captcha'); ?></span></a> 
	</li>
	<li>
      <label for="data-w3_font_size_min"><?php _e('Symbol Minimum Height','thethe-captcha'); ?>:</label>
      <input name="data[w3_font_size_min]" id="data-w3_font_size_min" class="str-field" value="<?php print $config['w3_font_size_min'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Specify the minumal height of the generating CAPTCHA symbols','thethe-captcha'); ?></span></a> 
	</li>
	<li>
      <label for="data-w3_font_size_max"><?php _e('Symbol Maximum Height','thethe-captcha'); ?>:</label>
      <input name="data[w3_font_size_max]" id="data-w3_font_size_max" class="str-field" value="<?php print $config['w3_font_size_max'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Specify the maximum height of the generating CAPTCHA symbols','thethe-captcha'); ?></span></a> 
	</li>
	<li>
      <label for="data-w3_char_angle_min"><?php _e('Maximum Symbol Left Slope','thethe-captcha'); ?>:</label>
      <input name="data[w3_char_angle_min]" id="data-w3_char_angle_min" class="str-field" value="<?php print $config['w3_char_angle_min'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Specify the maximal slop of the generating symbols to the left','thethe-captcha'); ?></span></a> 
	</li>
	 <li>
      <label for="data-w3_char_angle_max"><?php _e('Maximum Symbol Right Slope','thethe-captcha'); ?>:</label>
      <input name="data[w3_char_angle_max]" id="data-w3_char_angle_max" class="str-field" value="<?php print $config['w3_char_angle_max'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Specify the maximal slop of the generating symbols to the right','thethe-captcha'); ?></span></a> 
	</li>
	<li>
      <label for="data-w3_char_angle_shadow"><?php _e('Sadow Size','thethe-captcha'); ?>:</label>
      <input name="data[w3_char_angle_shadow]" id="data-w3_char_angle_shadow" class="str-field" value="<?php print $config['w3_char_angle_shadow'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Specify the symbol shadow size in pixels','thethe-captcha'); ?></span></a> 
	</li>
	<li>
      <label for="data-w3_char_align"><?php _e('Symbol Vertical Alignment','thethe-captcha'); ?>:</label>
      <input name="data[w3_char_align]" id="data-w3_char_align" class="str-field" value="<?php print $config['w3_char_align'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Specify the vertical alignment of the symbols','thethe-captcha'); ?></span></a> 
	</li>
	<li>
      <label for="data-w3_start"><?php _e('First Symbol Horizontal Position','thethe-captcha'); ?>:</label>
      <input name="data[w3_start]" id="data-w3_start" class="str-field" value="<?php print $config['w3_start'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Specify the horizontal position of the first symbol','thethe-captcha'); ?></span></a> 
	</li>
	<li>
      <label for="data-w3_interval"><?php _e('Symbols Interval','thethe-captcha'); ?>:</label>
      <input name="data[w3_interval]" id="data-w3_interval" class="str-field" value="<?php print $config['w3_interval'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Specify the interval between begininings of the symbols','thethe-captcha'); ?></span></a> 
	</li>
	<li>
      <label for="data-w3_chars"><?php _e('Symbols Set','thethe-captcha'); ?>:</label>
      <input name="data[w3_chars]" id="data-w3_chars" class="str-field" value="<?php print $config['w3_chars'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Enter the set of symbols to randomly use on CAPTCHA generation','thethe-captcha'); ?></span></a> 
	</li>
		<li>
      <label for="data-w3_noise"><?php _e('Noise Level','thethe-captcha'); ?>:</label>
      <input name="data[w3_noise]" id="data-w3_noise" class="str-field" value="<?php print $config['w3_noise'];?>" type="text">
      <a class="tooltip" href="javascript:void(0);">?<span><?php _e('Specify in % the graphic noise level. The more noise level the
harder to recognize a symbol','thethe-captcha'); ?></span></a> 
	</li>
  </ul>
</fieldset>
<?php
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
?>
<legend><?php _e('Example CAPTCHA','thethe-captcha'); ?></legend>
<?php
	echo '<img src="'.WP_PLUGIN_URL.'/thethe-captcha/lib/w3captcha.php?w3_count='.$config['w3_count'].'&w3_width='.$config['w3_width'].'&w3_height='.$config['w3_height'].'&w3_font_size_min='.$config['w3_font_size_min'].'&w3_font_size_max='.$config['w3_font_size_max'].'&w3_char_angle_min='.$config['w3_char_angle_min'].'&w3_char_angle_max='.$config['w3_char_angle_max'].'&w3_char_angle_shadow='.$config['w3_char_angle_shadow'].'&w3_char_align='.$config['w3_char_align'].'&w3_start='.$config['w3_start'].'&w3_interval='.$config['w3_interval'].'&w3_chars='.$config['w3_chars'].'&w3_noise='.$config['w3_noise'].'&w3_backg='.$w3_backg.'&w3_shadow='.$w3_shadow.'" alt="CAPTCHA" id="thethe_captcha" />
	<img src="'.WP_PLUGIN_URL.'/thethe-captcha/style/images/reload.gif" id="reload_captcha" alt="CAPTCHA Reload" title="CAPTCHA Reload"/>
	<br />
	';
 include 'inc.submit-buttons.php';?> 
</form>